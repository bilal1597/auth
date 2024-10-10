<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'password_confirm' => 'same:password'
        ]);

        $user = User::create($data);
        if ($user) {
            return redirect()->route('login');
        }

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);
        // return redirect('home');
        //}
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
    }

    public function dashboardPage()
    {
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    // public function admin()
    // {
    //     return view('admin');
    // }




    public function home()
    {
        return 'HomePage';
    }

    ////////////////////////////////   Authentication

    public function logout()
    {
        Auth::logout();
        return view('login');
    }




    // public function Register()
    // {
    //     return view('register');
    // }




}
