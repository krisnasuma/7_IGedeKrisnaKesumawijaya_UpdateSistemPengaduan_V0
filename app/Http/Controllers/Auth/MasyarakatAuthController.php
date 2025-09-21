<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasyarakatAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.masyarakat-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('masyarakat')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/masyarakat/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.masyarakat-register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16|unique:masyarakat',
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:masyarakat',
            'password' => 'required|min:6|confirmed',
            'telepon' => 'required|max:15',
            'alamat' => 'required'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Masyarakat::create($validated);

        return redirect()->route('masyarakat.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::guard('masyarakat')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}