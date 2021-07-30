<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function updateProfile(Request $request)
    {
        //return $request;

        $this->validate($request, [

            'name'  => 'required',
            'email' => 'required|email'
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        //toast('Admin Profile Successfully Updated', 'success');
        Toastr::success('Admin Profile Successfully Updated', 'Success');
        //Alert::success('Success Title', 'Reservation has been confirmed successfully');
        return back();
    }

    public function Password()
    {
        return view('backend.profile.password');
    }
    public function updatePassword(Request $request)
    {
        //return $request;

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $adminPassword = Admin::find(Auth::guard('admin')->id());
                $adminPassword->password = Hash::make($request->password);
                $adminPassword->save();
                Toastr::success('Password Successfully Changed', 'Success');
                //$request->session()->flash('success', 'Password successfully Updated!');
                Auth::guard('admin')->logout();
                return redirect()->back();
            } else {
                Toastr::error('New password cannot be the same as old password.', 'Error');
                //$request->session()->flash('error', 'New password cannot be the same as old password.');
                return redirect()->back();
            }
        } else {
            Toastr::error('Current password not match.', 'Error');
            //$request->session()->flash('error', 'Current password not match.');
            return redirect()->back();
        }
    }
}
