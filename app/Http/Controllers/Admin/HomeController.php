<?php

namespace App\Http\Controllers\Admin;

class HomeController extends AdminAppController
{
    protected $viewPath = "admin.dashboard.";

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view($this->viewPath . 'home');
    }
}
