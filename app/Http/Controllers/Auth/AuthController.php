<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
   
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/');
            }
        }else{
            return view('auth.login', [
                'title' => 'Login'
            ]);
        }
    }
    public function authentication(Request $request)
    {
        $credentials = $request->validate([

            'email' => 'required|email:dns',
            'password'=> 'required'
        ]);
        if (Auth::attempt($credentials)) {
            if (Auth::check()) {
                $role = Auth::user()->role;
        
                if ($role == 'admin') {
                    return redirect('/admin/dashboard');
                } else {
                    return redirect('/');
                }
            }
        }
        return back()->with('loginError', 'Username or Password Is Wrong');
    }
    public function register()
    {
        return view('auth.register', [
            'title' => 'Daftar'
        ]);
    }
    public function daftar(Request $request)
    {
       $validatedData = $request->validate([
        'name' => 'required|max:255|',
        'username' => ['required', 'min:4', 'max:20', 'unique:users'],
        'email' => ['required','email:dns','unique:users'],
        'password' => 'required|min:6|max:255',
        'nohp' => 'required|max:12',
       ], [
        'name.required' => 'Nama wajib diisi',
        'name.max' => 'Nama terlalu panjang',
        'username.required' => 'Username wajib diisi',
        'username.min' => 'Username terlalu pendek',
        'username.max' => 'Username terlalu panjang',
        'username.unique' => 'Username sudah ada',
        'email.email' => 'Email tidak valid',
        'email.required' => 'Email wajib diisi',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password tidak boleh kosong',
        'password.min' => 'Password terlalu pendek',
        'password.max' => 'Password terlalu panjang',
        'nohp.max' => 'No. Handphone maximal 12 angka',
        'nohp.required' => 'No. Handphone wajib diisi',
       ]);
       $validatedData['password'] = Hash::make($validatedData['password']);
       $validatedData['role'] = 'user';
       $validatedData['image'] = 'profile/default.png';

       User::create($validatedData);
       return redirect()->route('auth.login')->with('success', 'Pendaftaran Berhasil');
       
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
