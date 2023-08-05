<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // go to log in
    public function login() {
        if (view()->exists('user.login')) {
            return view('user.login'); 
        } else {
            return abort(404);
        }
    }

    // go to register
    public function register(){
        return view('user.register');
    }

    // login process
    public function process(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($validated)) {
            $request->session()->regenerateToken();
            return redirect('/')->with('message', 'Log in successful');
        } else {
            return redirect('/login')->with('message', 'Log in failed');
        }

    }

    // log out process
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'Log out Successful');
    }

    // register process
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        auth()->login($user);
    }
}
