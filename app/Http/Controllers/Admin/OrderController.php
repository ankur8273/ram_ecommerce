<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Throwable;

class OrderController extends AdminAppController
{
    protected $viewPath = "admin.order.";

    public function index()
    {
        try {
            $records = Order::with(['visitor', 'product'])->whereNull('deleted_at')->get();
            return view($this->viewPath . 'index', compact('records'));
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }
    }

    public function view($slug)
    {
        try {
            $record = Order::with(['product', 'visitor'])->where('slug', $slug)->whereNull('deleted_at')->first();
            return view($this->viewPath . 'view', ['record' => $record]);
        } catch (Throwable $ex) {
            return redirect()->back()->with('error', 'Error occurred : ' . $ex->getMessage());
        }

    }
}
