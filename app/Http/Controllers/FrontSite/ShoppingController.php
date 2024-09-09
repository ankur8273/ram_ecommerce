<?php

namespace App\Http\Controllers\FrontSite;

use App\Helpers\Helper;
use App\Http\Controllers\FrontSite\AppController;
use App\Models\AddressBook;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShoppingController extends AppController
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'slug' => 'required',
        ]);
        try {
            if (Auth::guard('visitor')->user() && Auth::guard('visitor')->user()->visitor_id) {
                $product = Product::where('slug', $request->slug)->first();
                if (!empty($product)) {
                    $cart = Cart::where(['visitor_id' => Auth::guard('visitor')->user()->visitor_id, 'product_id' => $product->product_id])->first();
                    if (empty($cart)) {
                        $record = [
                            'slug' => Helper::slug(),
                            'product_id' => $product->product_id ?? null,
                            'quantity' => 1,
                            'visitor_id' => Auth::guard('visitor')->user()->visitor_id,
                            'created_by' => Auth::guard('visitor')->user()->visitor_id,
                        ];
                        $status = Cart::insert($record);
                    } else {
                        $status = Cart::where('cart_id', $cart->cart_id)->increment('quantity');
                    }
                }

                if ($status) {
                    $records = [
                        'status' => 200,
                        'message' => 'Item added to cart successfully.',
                    ];
                } else {
                    $records = [
                        'status' => 400,
                        'message' => 'Failed to add item to cart. Please try again later',
                    ];
                }
            } else {
                $records = [
                    'status' => 401,
                    'message' => 'Please login to countinue',
                ];

            }
        } catch (Throwable $ex) {
            $records = [
                'status' => 500,
                'message' => 'Error occurred: ' . $ex->getMessage(),
            ];
        }
        return response()->json($records);
    }

    public function cartItems(Request $request)
    {
        try {
            if (Auth::guard('visitor')->user() && Auth::guard('visitor')->user()->visitor_id) {
                $cart = Cart::with(['product'])->where(['visitor_id' => Auth::guard('visitor')->user()->visitor_id])->get();
                return view('cart', ['items' => $cart]);
            }
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'event' => 'required',
        ]);
        try {
            $status = "";
            $cart = Cart::where(['slug' => $request->slug])->first();
            if (!empty($cart)) {
                $eventType = $request->event ?? null;
                if ($eventType == "inc") {
                    $status = Cart::where('cart_id', $cart->cart_id)->increment('quantity');
                } elseif ($eventType == "desc") {
                    if ($cart->quantity > 1) {
                        $status = Cart::where('cart_id', $cart->cart_id)->decrement('quantity');
                    } else {
                        $status = Cart::where('cart_id', $cart->cart_id)->delete();
                    }
                }
            }
            if ($status) {
                $records = [
                    'status' => 200,
                    'message' => 'Cart item updated successfully.',
                ];
            } else {
                $records = [
                    'status' => 400,
                    'message' => 'Failed to update cart item. Please try again later',
                ];
            }

        } catch (Throwable $ex) {
            $records = [
                'status' => 500,
                'message' => 'Error occurred: ' . $ex->getMessage(),
            ];
        }
        return response()->json($records);
    }

    public function removeCartItems(Request $request, $slug)
    {
        try {
            $cart = Cart::where(['slug' => $slug])->first();
            if (!empty($cart)) {
                Cart::where('cart_id', $cart->cart_id)->delete();
            }
            return redirect()->back()->with('error', 'Item removed from cart.');
        } catch (Throwable $ex) {
            $records = [
                'status' => 500,
                'message' => 'Error occurred: ' . $ex->getMessage(),
            ];
        }
        return response()->json($records);
    }

    public function checkout(Request $request)
    {
        try {
            if (Auth::guard('visitor')->user() && Auth::guard('visitor')->user()->visitor_id) {
                $cart = Cart::with(['product'])->where(['visitor_id' => Auth::guard('visitor')->user()->visitor_id])->get();
                return view('checkout', ['items' => $cart]);
            }
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }

    public function placeOrder(Request $request)
    {
        try {
            if (Auth::guard('visitor')->user() && Auth::guard('visitor')->user()->visitor_id) {
                $slug=Helper::slug();
                $address = AddressBook::where(['visitor_id' => Auth::guard('visitor')->user()->visitor_id])->whereNull('deleted_at')->first();
                if (empty($address)) {
                    $addressRecord = [
                        'slug' => $slug,
                        'visitor_id' => Auth::guard('visitor')->user()->visitor_id,
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'address1' => $request->address1,
                        'address2' => $request->address2,
                        'city' => $request->city,
                        'state' => $request->state,
                        'pincode' => $request->pincode,
                        'created_by' => Auth::guard('visitor')->user()->visitor_id,
                    ];
                    $addressId = AddressBook::insertGetId($addressRecord);
                } else {
                    $addressId = $address->address_id;
                }

                $cartItems = Cart::with(['product'])->where(['visitor_id' => Auth::guard('visitor')->user()->visitor_id])->get();
                $orderItems = [];
                if (!empty($cartItems)) {
                    foreach ($cartItems as $cartItem) {
                        $orderItems[] = [
                            'slug' => $slug,
                            'visitor_id' => Auth::guard('visitor')->user()->visitor_id,
                            'product_id' => $cartItem->product_id,
                            'address_id' => $addressId,
                            'quantity' => $cartItem->quantity,
                            'product_name' => $cartItem->product ? $cartItem->product->name : null,
                            'product_price' => $cartItem->product ? $cartItem->product->price : null,
                            'order_notes' => $request->ordernote ?? null,
                        ];
                        Cart::where('cart_id', $cartItem->cart_id)->delete();
                    }
                    if (!empty($orderItems)) {
                        Order::insert($orderItems);
                        return redirect()->route('front-home')->with('success', 'Order Placed Successfully !');
                    }
                }
            }
            return redirect()->back();
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }
    public function getOrderList()
{
    
          $visitorId = Auth::guard('visitor')->user()->visitor_id;




    try {
        $orders =  DB::select("
        SELECT o.order_id as order_id,o.slug, p.name as product_name, o.quantity, o.product_price, o.order_notes, o.created_at,
        a.name,a.phone,a.email,a.address1,
        a.address2,a.city,a.state,a.pincode
        FROM orders o
        JOIN products p ON o.product_id = p.product_id
        JOIN address_books a ON a.address_id = o.address_id
        WHERE o.visitor_id = :visitorId
        ORDER BY o.created_at DESC
    ", ['visitorId' => $visitorId]);
      
        return view('order_list', ['orders' => $orders]);
    } catch (\Exception $e) {
        Log::error('Database query failed: ' . $e->getMessage());
        print_r($e->getMessage());
        echo 'An error occurred. Please check the logs for details.';
    }

}

}
