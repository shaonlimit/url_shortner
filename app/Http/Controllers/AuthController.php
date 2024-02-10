<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        } else {
            return view('login');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function register()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        } else {
            return view('register');
        }
    }

    public function register_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters long.',
        ]);

        try {
            User::create($request->all());
            toastr()->success('Account created successfully! Please login', 'Congrats');
            return redirect()->route('login');
        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            return redirect()->back();
        }
    }

    public function login_store(Request $request)
    {
        $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters long.',
        ]);


        try {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->route('dashboard');
            } else {
                toastr()->error("Coudn't found the account!", 'Sorry');
                return redirect()->back();
            }
        } catch (Exception $e) {
            toastr()->error("Something went wrong! Please try again.", 'Error');
            return redirect()->back();
        }
    }
}
