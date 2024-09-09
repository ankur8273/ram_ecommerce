<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\MediaFIle;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ProductController extends AdminAppController
{
    protected $viewPath = "admin.product.";
    protected $uplaodPath = 'uploads/product';

    public function index()
    {
        try {
            $records = Product::with(['category'])->whereNull('deleted_at')->get();
            return view($this->viewPath . 'index', compact('records'));
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }

    public function create()
    {
        $categories = Category::whereNull('deleted_at')->where('status_id', 1)->orderBy('name')->pluck('name', 'category_id');

        return view($this->viewPath . 'form', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg|max:5000',
        ], [
            'photo.required' => 'The banner is required.',
        ]);
        try {
            $bannerImage = null;
            if (!empty($request->file('photo'))) {
                $fileRecord = MediaFIle::fileUpload($request, 'photo', $this->uplaodPath);
                if (isset($fileRecord['status']) && $fileRecord['status'] == 1) {
                    $bannerImage = isset($fileRecord['file_name']) ? $fileRecord['file_name'] : null;
                }
            }
            $record = [
                'slug' => Helper::slug(),
                'name' => $request->name ?? null,
                'category_id' => $request->category ?? 0,
                'description' => $request->description ?? null,
                'banner' => $bannerImage,
                'quantity' => $request->quantity ?? null,
                'price' => $request->price ?? null,
                'discount_price' => $request->discount_price ?? null,
                'created_by' => Auth::id(),
            ];

            $category = Product::create($record);
            if ($category) {
                return redirect()->route('product-index')->with('success', 'Record Added Successfully !');
            }
            return redirect()->back()->with('error', 'Record not saved.');
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }

    public function edit($slug)
    {
        try {
            $record = Product::where('slug', $slug)->whereNull('deleted_at')->first();
            $categories = Category::whereNull('deleted_at')->where('status_id', 1)->orderBy('name')->pluck('name', 'category_id');
            return view($this->viewPath . 'form', ['categories' => $categories, 'record' => $record]);
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }

    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'photo' => 'mimes:jpg,png,jpeg|max:5000',
        ]);
        try {
            $record = Product::where('slug', $slug)->whereNull('deleted_at')->first();
            if (!empty($record)) {
                $bannerImage = $record->banner;
                if (!empty($request->file('photo'))) {
                    $fileRecord = MediaFIle::fileUpload($request, 'photo', $this->uplaodPath, $bannerImage);
                    if (isset($fileRecord['status']) && $fileRecord['status'] == 1) {
                        $fileName = isset($fileRecord['file_name']) ? $fileRecord['file_name'] : null;
                        $bannerImage = $fileName;
                    }
                }

                $record = [
                    'name' => $request->name ?? null,
                    'category_id' => $request->category ?? 0,
                    'description' => $request->description ?? null,
                    'quantity' => $request->quantity ?? null,
                    'price' => $request->price ?? null,
                    'discount_price' => $request->discount_price ?? null,
                    'banner' => $bannerImage,
                    'status_id' => $request->status ?? 1,
                    'updated_by' => Auth::id(),
                ];
                $product = Product::where('slug', $slug)->update($record);
                if ($product) {
                    return redirect()->route('product-index')->with('success', 'Record updated Successfully !');
                }
            }
            return redirect()->back()->with('error', 'Record not exist.');
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }

    public function view($slug)
    {
        try {
            $record = Product::with(['category', 'images'])->where('slug', $slug)->whereNull('deleted_at')->first();
            return view($this->viewPath . 'view', ['record' => $record]);
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }

    }

    public function uploadImage(Request $request, $slug)
    {
        $request->validate([
            'photo' => 'required|array|max:5',
            'photo.*' => 'mimes:jpg,png,jpeg|max:8000',
        ], ['photo.max' => 'Only 5 image allow at a time.']);

        try {
            $product = Product::with(['category'])->where('slug', $slug)->whereNull('deleted_at')->first();
            if (!empty($product)) {
                $images = [];
                $fileRecord = MediaFIle::UploadMultipleFiles($request, 'photo', 'uploads/product-image');
                if (!empty($fileRecord)) {
                    foreach ($fileRecord as $files) {
                        $images[] = [
                            'slug' => Helper::slug(),
                            'name' => $files['file_name'] ?? null,
                            'product_id' => $product->product_id ?? 0,
                            'status_id' => 1,
                            'created_by' => Auth::id(),
                        ];
                    }
                }

                if (!empty($images)) {
                    $image = ProductImage::insert($images);
                    if ($image) {
                        return redirect()->route('product-details', ['slug' => $slug])->with('success', 'Images uploaded successfully!');
                    }
                }
            }
            return redirect()->back()->with('error', 'Record not saved.');
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }

    }
}
