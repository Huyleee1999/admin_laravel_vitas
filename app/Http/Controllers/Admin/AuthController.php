<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login() {
        return view('admin.login.login');
    }

    public function checkLogin(Request $request) {
        // $data = $request->validated();
        
        // $admin = AdminAccount::select('email','password')->find(3);

        // if(($request->email == $admin->email) && ($request->password == $admin->password)) {
        //     return redirect()->route('admin.dashboard');
        // } else {
        //     return redirect()->route('admin.auth-login');
        // }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.auth-login')->with('msg', 'Đăng nhập thất bại!!');
        }
    }

    public function register() {
        return view('admin.register.register');
    }

    public function checkRegister(UserFormRequest $request) {
        $data = $request->validated();

        $admin = new User;
        $admin->name = $data['name']; 
        $admin->phone = $data['phone']; 
        $admin->email = $data['email']; 
        $admin->password = bcrypt($data['password']); 

        $admin->save();
        return redirect()->route('admin.auth-register')->with('msg', 'Tạo tại khoản thành công!!');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.auth-login');
    }
}
