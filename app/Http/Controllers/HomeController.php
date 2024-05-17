<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\kategori;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $kategori = DB::table('kategoris')->get();         
        $value = [];         
        $label = [];    
        $kategoriProduk = [];
        
        foreach ($kategori as $kp){
            $kategoriProduk = $kp->kategori;
        }
        //cara cek nilai data dengan dd 
        // dd (json_encode($kategoriProduk)); 
        foreach ($kategori as $i => $v) {             
            $value[$i] = DB::table('produks')->where('id_kategori',$v->id)->count();             
            $label[$i] = $v->kategori;         
        }  
        //cara cek nilai data dengan dd  
        // dd (json_encode($value));     
        // dd (json_encode($label)); 
        return view('home')            
            ->with('value',json_encode($value))             
            ->with('label',json_encode($label))
            ->with('kategoriProduk',json_encode($kategoriProduk));
            // return view('home');
    }
}
