<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCover extends Controller
{
    public function index()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.authentications.auth-login-cover', ['pageConfigs' => $pageConfigs]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('user_id', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['user_id' => $user->user_id]);
            session(['level' => $user->level]);
            session(['role' => $user->role]);
            return redirect('/dashboard');
        }

        // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan error.
        return redirect('/login-area')->with('error', 'Wrong User ID / Password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect ke halaman login dengan pesan berhasil logout.
        return redirect('/login-area')->with('success', 'You have successfully logout.');
    }
}
