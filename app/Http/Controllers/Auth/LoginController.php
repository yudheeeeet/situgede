<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Better import

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Option 1: Use this if you want simple redirect
    protected $redirectTo = '/dashboard';

    // Option 2: Or use dynamic redirect method
    // public function redirectTo()
    // {
    //     return route('dashboard');
    // }

    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    // This method is actually optional now since $redirectTo handles it
    // But keep it if you want to add flash messages or logging
    protected function authenticated(Request $request, $user)
    {
        // Optional: Add success message
        // session()->flash('success', 'Welcome back, ' . $user->name);
        
        return redirect()->route('admin');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        // Optional: Add logout message
        // session()->flash('success', 'You have been logged out successfully.');
 
        return redirect()->route('login'); // Using named route is better
    }
}