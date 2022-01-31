<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function regView()
    {
        return view('auth.reg');
    }

    public function regAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|max:20|same:password',
        ]);
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);
        $user->createToken('MyAuthApp')->plainTextToken;
        UserRole::create([
            'user_id' => $user->id,
            'role_name' => 'user'
        ]);
        return redirect()->route('login.view');
    }

    public function loginAction(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            if ($request->email == $user->email) {
                if (Hash::check($request->pass, $user->password)) {
                    $request->session()->put('user_id', $user->id);
                    return redirect()->route('dashboard.view')->with('msg', 'Successfully Logged in!');
                } else {
                    return redirect()->route('login.view')->with('error', 'Wrong Password');
                }
            }
        } else {
            return redirect()->route('login.view')->with('error', 'User not found');
        }
    }

    public function dashboardView()
    {
        return view('dashboard');
    }
    public function adminDashboardView()
    {
        return view('admin-dashboard');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login.view');
    }
}
