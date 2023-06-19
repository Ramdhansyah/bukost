<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class BerandaAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
    public function profile(User $user)
    {
        return view('admin.profile', [
            'title' => 'Profile',
            'data' => $user
        ]);
    }
    public function updateProfile(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|',
            'username' => ['required', 'min:4', 'max:20'],
            'email' => ['required','email:dns'],
            'password' => 'max:255',
            'nohp' => 'required|max:12',
            'image' => 'image|file|max:10240'
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
            'password.min' => 'Password terlalu pendek',
            'password.max' => 'Password terlalu panjang',
            'nohp.max' => 'No. Handphone maximal 12 angka',
            'nohp.required' => 'No. Handphone wajib diisi',
            
           ]);
           if (empty($validatedData['password'])) {
            $validatedData['password'] = $user->password;
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
           $validatedData['role'] = 'user';
           if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('gambar-kos');
            }else{
            $validatedData['image'] = $user->image;
        }

        $user->update($validatedData);
        return back()->with('success', 'Profile Telah Diperbarui');
    }
}
