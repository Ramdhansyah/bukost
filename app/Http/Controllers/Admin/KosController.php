<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreKosRequest;
use App\Http\Requests\UpdateKosRequest;
use App\Models\Kos;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class KosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kos.index', [
            'title' => "Data Kos",
            'kos' => Kos::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kos.tambah', [
            'title' => "Tambah Kos",
            'category' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKosRequest $request)
    {
       $validatedData = $request->validated();
       $validatedData['image'] = $request->file('image')->store('gambar-kos');
       $validatedData['user_id'] = Auth::user()->id;
       $validatedData['status'] = "Aktif";
       
       Kos::create($validatedData);
       return redirect()->route('admin.kos.index')->with('success', 'Data Kos Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kos $kos)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kos $ko)
    {
        return view('kos.edit', [
            'title' => "Edit Kos",
            'category' => Category::all(),
            'data' => $ko,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKosRequest $request, Kos $ko)
    {
        $kos = $ko;
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('gambar-kos');
        }else{
            $validatedData['image'] = $kos->image;
        }
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['status'] = "Aktif";
        
        $kos->update($validatedData);
        return redirect()->route('admin.kos.index')->with('success', 'Data Kos Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kos::destroy($id);
        return back()->with('success', 'Data Kos Berhasil Dihapus');
    }
}
