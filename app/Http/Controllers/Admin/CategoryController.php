<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\MediaFIle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CategoryController extends AdminAppController
{
    protected $viewPath = "admin.category.";
    protected $uplaodPath = 'uploads/category';

    public function index()
    {
        try {
            $records = Category::whereNull('deleted_at')->get();
            return view($this->viewPath . 'index', compact('records'));
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }

    public function create()
    {
        return view($this->viewPath . 'form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'description' => 'required',
            'photo' => 'mimes:jpg,png,jpeg|max:5000',
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
                'description' => $request->description ?? null,
                'banner' => $bannerImage,
                'created_by' => Auth::id(),
            ];

            $category = Category::create($record);
            if ($category) {
                return redirect()->route('category-index')->with('success', 'Record Added Successfully !');
            }
            return redirect()->back()->with('error', 'Record not saved.');
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }

    public function edit($slug)
    {
        try {
            $record = Category::where('slug', $slug)->whereNull('deleted_at')->first();
            return view($this->viewPath . 'form', compact('record'));
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }

    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'photo' => 'mimes:jpg,png,jpeg|max:5000',
        ]);
        try {
            $record = Category::where('slug', $slug)->whereNull('deleted_at')->first();
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
                    'description' => $request->description ?? null,
                    'status_id' => $request->status ?? 1,
                    'banner' => $bannerImage,
                    'updated_by' => Auth::id(),
                ];
                $category = Category::where('slug', $slug)->update($record);
                if ($category) {
                    return redirect()->route('category-index')->with('success', 'Record updated Successfully !');
                }
            }
            return redirect()->back()->with('error', 'Record not exist.');
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }
}
