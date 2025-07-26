<?php

namespace App\Http\Controllers\Saler;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class SalerController extends Controller
{
    // Saler Login View---------------------------->
    public function loginView()
    {
        return view('saler-login');
    }

    // Saler Register View---------------------------->
    public function registerView()
    {
        return view('saler-register');
    }

    // Saler Waiting Page View---------------------------->
    public function waitingPageView()
    {
        return view('waiting-page');
    }

    // Saler Register Function---------------------------->
    public function salerRegister(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'mobile'   => 'required',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'mobile'    => $validated['mobile'],
            'password' => bcrypt($validated['password']),
            'type'     => 'saler',
        ]);

        return redirect()->route('waiting-page')->with('success', 'Saler registered successfully.');
    }

    // Saler Login Function---------------------------->
    public function salerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('salers')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('stock-dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    // Saler Logout Function---------------------------->
    public function salerLogout()
    {
        Auth::guard('salers')->logout();
        Session::flush();
        return redirect()->route('saler-login');
    }
}
