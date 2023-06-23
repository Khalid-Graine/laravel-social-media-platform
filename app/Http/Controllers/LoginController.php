<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('flogin.login');
    }


    public function login(Request $request)
    {
        // Get email and password from user input
        $values = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to authenticate the user
        if (Auth::attempt($values)) {
            // Regenerate the session and redirect to the home page with a success message
            $request->session()->regenerate();
            return to_route('home')->with('success', 'you loged successfully');
        } else {
            // Return to the previous page with an error message indicating an incorrect email
            return back()->withErrors([
                'email' => 'your email incorrect',
            ])->onlyInput('email')
            ;
        }
    }

    public function logout() {
        session()->flush();
        Auth::logout();
        return to_route('home')->with('success', 'you logout successfully');
    }
}
