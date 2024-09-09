<?php

namespace App\Http\Controllers\FrontSite;

use App\Http\Controllers\FrontSite\AppController;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class VisitorsHomeController extends AppController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        echo "Order List";
        // $record = [
        //     'total_student' => 500,
        // ];
        // return view('welcome', ['records' => $record]);
    }


    public function profile()
    {
        $record = Visitor::where('visitor_id', Auth::guard('visitor')->user()->visitor_id)->whereNull('deleted_at')->first();
        return view('auth.profile', ['profile' => $record]);
    }

    public function updateProfile(Request $request)
    {
        $authId = Auth::guard('visitor')->user()->visitor_id;
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:visitors,email,' . $authId . ',visitor_id,deleted_at,NULL',
            'contact' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'whatsapp_number' => 'required',
            'department' => 'required',
        ], [
            'department.required' => 'The stream  field is required.',
        ]);
        $cityId = $stateId = $departmentId = 0;

        $fullName = $request->name;
        $emailId = $request->email;
        $visitor = Visitor::where('visitor_id', $authId)->first();
        $visitor->name = $fullName;
        $visitor->email = $emailId;
        $visitor->department_id = $departmentId;
        $visitor->state_id = $stateId;
        $visitor->city_id = $cityId;
        $visitor->contact = $request->contact;
        $visitor->whatsapp_number = $request->whatsapp_number;
        $visitor->address = $request->address;
        $status = $visitor->save();
        if ($status) {
            return redirect()->route('front-visitor-home')->with('success', 'Profile Updated Successfully.');
        } else {
            return redirect()->route('front-visitor-profile')->with('error', 'Somthing went wrong. Please try again.');
        }
    }
}
