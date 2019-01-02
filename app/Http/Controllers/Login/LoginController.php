<?php

namespace App\Http\Controllers\Login;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('tasks.index');
        } else {
            return redirect()->intended(route('login'));
        }
    }
}
