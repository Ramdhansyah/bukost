<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {   
        $keyword = $request->keyword;
        $category = $request->c;
    
        $kos = Kos::search($keyword, $category)->paginate(10);
        return view('home.home',[
            'title' => 'Home',
            'kos' => $kos,
            'nama' => $request->c
        ]);
    }
    public function about()
    {
        return view('home.about',[
            'title' => 'About Us',
    
        ]);
    }
    public function show(Request $request)
    {
        if(Auth::check()){
            return view('home.show',[
                'title' => 'Detail Kos',
                'kos' => Kos::where('id', $request->id)->first(),
            ]);
        }else{
            return redirect()->route('auth.login')->with('error', 'Silahkan login terlebih dahulu untuk melakukan pesanan');
        }
    }
   
}
