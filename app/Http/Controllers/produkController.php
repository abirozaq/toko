<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\kategori;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil semua data produk berelasi dengan kategori
        $produk=produk::All();
        return view('produk.index',['produk'=>$produk]);
    }

/*         $produk = DB::table('produks')
        ->join('kategoris','kategoris.id','=','produks.id_kategori')
        ->get();
        if (!$produk) {
            abort(404);
        }
        return view('produk/index',compact('produk')); */


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = kategori::all();
        return view('produk/create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(Request $request)
    {
        //validasi dengan pesan yang tidak kita buat sendiri
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'qty' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);
        //validasi dengan pesan yang kita buat sendiri
/*         $aturan=[
            'nama' => 'required',
            'kategori' => 'required',
            'qty' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ];
        $pesan = [           
            'required' => 'Data ini Wajib Diisi !',          
            'numeric' => 'Mohon isi dengan angka'         
            ];          
            $this->validate($request,$aturan,$pesan); */
            

        produk::create([             
            'nama' => $request->nama,             
            'id_kategori' => $request->kategori,             
            'qty' => $request->qty,             
            'harga_beli' => $request->harga_beli,             
            'harga_jual' => $request->harga_jual,         
        ]);         
        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data produk
        $produk = produk::findOrFail($id);
        $kategori = kategori::orderBy('kategori', 'asc')->get()->pluck('kategori','id');
        return view('produk.show',['produk'=>$produk, 'kategori'=>$kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan data yang akan diedit

        $produk = produk::findOrFail($id);
        $kategori = kategori::orderBy('kategori', 'asc')->get()->pluck('kategori','id');
        return view('produk.edit',['produk'=>$produk, 'kategori'=>$kategori]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Proses perubahan data pada tabel di database
        produk::where('id',$id)         
        ->update([             
        'nama' => $request->nama,             
        'id_kategori' => $request->kategori,             
        'qty' => $request->qty,             
        'harga_beli' => $request->harga_beli,             
        'harga_jual' => $request->harga_jual,         
        ]);         
        return redirect()->route('produk.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $produk = produk::findOrFail($id);
        // $produk->get_kategori()->detach();

        if ($produk->delete()) {
            return redirect(route('produk.index'))->with('success','Deleted!');
        }

        return redirect(route('produk.index'))->with('error','Sorry, unable to delete this!');
    }
}
