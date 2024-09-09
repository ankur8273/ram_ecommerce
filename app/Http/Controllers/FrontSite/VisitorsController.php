<?php

namespace App\Http\Controllers\FrontSite;

use App\Helpers\Helper;
use App\Http\Controllers\FrontSite\AppController;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VisitorsController extends AppController
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5|max:20',
        ], [
            'email.exists' => 'This email is not exist',
        ]);
        $visitor = Visitor::where('email', $request->email)->where('status_id', 1)->whereNull('deleted_at')->first();
        if (!empty($visitor)) {
            $creds = $request->only('email', 'password');
            if (Auth::guard('visitor')->attempt($creds)) {
                return redirect()->route('front-home');
                // return redirect()->route('front-visitor-home');
            } else {
                return redirect()->route('front-login')->with('error', 'Incorrect Credentials');
            }
        } else {
            return redirect()->route('front-login')->with('error', 'Invalid email Id.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:visitors',
            'number' => 'required|string|max:10',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'The name field is required.',
            'number.required' => 'The phone name field is required.',
        ]);

        $fullName = $request->name;
        $password = $request->password;
        $emailId = $request->email;

        $visitor = new Visitor();
        $visitor->slug = Helper::slug();
        $visitor->name = $fullName;
        $visitor->email = $emailId;
        $visitor->password = Hash::make($password);
        $visitor->phone = $request->number;
        // $visitor->address = $request->address;

        $status = $visitor->save();
        if ($status) {
            return redirect()->route('front-register')->with('success', 'Your registration was successful. Please login to continue shopping!');
        } else {
            return redirect()->route('front-register')->with('error', 'Somthing went wrong. Please try again.');
        }
    }

    public function logout()
    {
        Auth::guard('visitor')->logout();
        return redirect()->route('front-login')->with('success', 'Logout Successfully');
    }

    public function changePassword(Request $request)
    {
        $authId = Auth::guard('visitor')->user()->visitor_id;
        $request->validate([
            'current_password' => 'required',
            'password_confirmation' => 'required',
            'new_password' => 'required',
        ]);
        // The passwords matches
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        // Current password and new password same
        if (strcmp($request->current_password, $request->new_password) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
        ]);
        //Change Password
        $user = Visitor::find($authId);
        $user->password = Hash::make($request->new_password);
        $user->update();
        return redirect()->back()->with("success", "Password successfully changed!");
    }

    public function forgotPassword()
    {
        return view('site.visitor.forgot');
    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:visitors,email,status_id,1',
        ], [
            'email.exists' => 'This email does not exist. Please enter a valid email.',
        ]);
        $email = $request->email;
        $record = Visitor::where(['email' => $email, 'status_id' => 1])->whereNull('deleted_at')->first();
        if (!empty($record)) {
            $passwordString = 123456;
            $data = [
                'password' => Hash::make($passwordString),
            ];
            $status = Visitor::where('visitor_id', $record->visitor_id)->update($data);
            if ($status) {
                $userId = $record->user_id;
                return redirect()->route('front-forgot-password')->with('success', 'We have send login details. Please check your email inbox.');
            } else {
                return redirect()->route('ront-forgot-password')->with('error', 'Somthing went wrong. Please try again.');
            }
        } else {
            return redirect()->route('front-forgot-password')->with('error', 'This email does not exist. Please enter a valid email.');
        }
    }
}
