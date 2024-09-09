<?php

namespace App\Http\Controllers\FrontSite;

use App\Http\Controllers\FrontSite\AppController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class HomeController extends AppController
{
    public function index()
    {
        $products = Product::with(['category'])->where('status_id', 1)->whereNull('deleted_at')->get();
        $categories = Category::where('status_id', 1)->whereNull('deleted_at')->get();
        return view('welcome', ['products' => $products, 'categories' => $categories]);
    }

    public function products(Request $request, $slug = null)
    {
        try {
            $products = Product::with(['category', 'images'])->where('status_id', 1)->whereNull('deleted_at');
            if ($slug) {
                $category = Category::where(['slug' => $slug, 'status_id' => 1])->whereNull('deleted_at')->first();
                if (!empty($category)) {
                    $products = $products->where('category_id', $category->category_id);
                }
            }
            $products = $products->get();

            return view('products', ['products' => $products]);
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }

    }
}
