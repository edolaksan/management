<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = Http::post('https://crm.yellowfitkitchen.com/api/v1/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            // Simpan token ke session atau lakukan autentikasi lokal
            // Misal:
            // $request->session()->put('token', $response['token']);
            Auth::loginUsingId(1); // Ganti dengan logika autentikasi Anda
            return redirect('/home');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}
