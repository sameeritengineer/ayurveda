<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index()
    {
        return view('admin.manage-user.index');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'user_type' => ['required']
        ]);

        $user = new User();

        if($request->user_type === 'user'){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->user_type = 'user';
            $user->save();

            //toastr('Created Successfully!', 'success', 'success');
            return redirect()->back();
        }elseif($request->user_type === 'admin'){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->user_type = 'admin';
            $user->save();

            //toastr('Created Successfully!', 'success', 'success');
            return redirect()->back();
        }
    }
}
