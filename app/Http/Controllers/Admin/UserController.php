<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kos;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreKosRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user', [
            'title' => "Data User",
            'user' => User::where('id','<>', '1')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-user', [
            'title' => "Tambah User",
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required|max:255|',
            'username' => ['required', 'min:4', 'max:20', 'unique:users'],
            'email' => ['required','email:dns','unique:users'],
            'password' => 'required|min:6|max:255',
            'nohp' => 'required|max:12',
            'role' => 'required'
           ], [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama terlalu panjang',
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username terlalu pendek',
            'username.max' => 'Username terlalu panjang',
            'username.unique' => 'Username sudah ada',
            'email.email' => 'Email tidak valid',
            'email.required' => 'Email wajib diisi',
            'role.required' => 'Role belum dipilih',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password terlalu pendek',
            'password.max' => 'Password terlalu panjang',
            'nohp.max' => 'No. Handphone maximal 12 angka',
            'nohp.required' => 'No. Handphone wajib diisi',
           ]);
           $validatedData['password'] = Hash::make($validatedData['password']);
           $validatedData['image'] = 'profile/default.png';
    
           User::create($validatedData);
           return redirect()->route('admin.user.index')->with('success', 'User Baru Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kos $kos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.edit-user', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|',
            'username' => ['required', 'min:4', 'max:20'],
            'email' => ['required','email:dns'],
            'password' => 'max:255',
            'nohp' => 'required|max:12',
            'image' => 'image|file|max:10240',
            'role' => 'required'
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
        $validatedData['image'] = $user->image;
        $user->update($validatedData);
        return redirect()->route('admin.user.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('success', 'Data User Berhasil Dihapus');
    }
}
