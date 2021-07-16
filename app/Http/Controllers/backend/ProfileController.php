<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileView()
    {
        $user = User::find(Auth::user()->id);
        return view('backend.profile.profile-view', compact('user'));
    }

    public function profileEdit()
    {
        $user = User::find(Auth::user()->id);
        return view('backend.profile.profile-edit', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $validatedData = $request->validate([
            'email' => 'required|unique:users,email,'.$id,
            'name' => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        if ($request->file('image')) {
            $file = $request->file('image');
            if ($user->image) {
                unlink(public_path('upload/user_images/'.$user->image));
            }
            $filename = Date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $user->image = $filename;
        }
        $user->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('profile.view')->with($notification);
    }

    public function profilePasswordChange()
    {
        return view('backend.profile.profile-change-password');
    }

    public function profilePasswordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user = User::find(Auth::user()->id);
        $hashedPassword = $user->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }
}
