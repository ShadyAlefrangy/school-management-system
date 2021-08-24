<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userView()
    {
        $data['users'] = User::where('usertype', 'Admin')->get();
        return view('backend.user.user-view', $data);
    }

    public function userCreate()
    {
        return view('backend.user.user-create');
    }

    public function userStore(Request $request)
    {
        
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);
        $user = New User();
        $code = rand(0000, 9999);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = 'Admin';
        $user->role = $request->role;
        $user->code = $code;
        $user->password = bcrypt($code);
        $user->save();
        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.view')->with($notification);

    }
    public function userEdit($id)
    {
        $user = User::find($id);
        return view('backend.user.user-edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'email' => 'required|unique:users,email,'.$id,
            'name' => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('user.view')->with($notification);

    }

    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('user.view')->with($notification);

    }

}
