@extends('layouts.app') 
@section('content') 
<div class="container">     
<div class="row">       
<div class="col-md-12">         
<div class="panel panel-default">           
<div class="panel-head container-fluid" style="margin-top: 10px;">            
 <p>Edit Data produk</p>           
</div>           
<div class="panel-body">            
 <form  class="form-horizontal"  action="{{ url('produk/update',$produk->id) }}" method="post">               
 @csrf         
 @method('PUT')   
 <!-- <input type="hidden" name="_method" value="PUT"> -->
        <div class="form-group">                
        <label  class="control-label  col-sm-2">Nama Produk</label>                
            <div class="col-sm-10">                   
                <input  type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $produk->nama }}">                             
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
            </div>               
        </div>              
 <div class="form-group">                 
<label  class="control-label  col-sm-2">Kategori Produk</label>                 
<div class="col-sm-10">                   
<select  name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori">  
                            @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror                  
                    <option value="">--Pilih Kategori--</option>
                    @foreach ($kategori as $kategoriID => $kategori)
                        <option value="{{ $kategoriID }}" @selected(old('kategori') == $kategoriID || $produk->id_kategori == $kategoriID)>
                        {{ $kategori}}
                        </option>
                    @endforeach

</select>                 
</div>               
</div>              
 <div class="form-group">                 
<label  class="control-label  col-sm-2">Qty Awal</label>                 
<div class="col-sm-10">                  
 <input  type="text"  name="qty"  class="form-control @error('qty') is-invalid @enderror" id="qty" value="{{ $produk->qty }}">                
                            @error('qty')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror   
</div>               
</div>               
<div class="form-group">                 
<label  class="control-label  col-sm-2">Harga Beli</label>                 
<div class="col-sm-10">                  
 <input  type="text" name="harga_beli"  class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" value="{{ $produk->harga_beli }}">                
                            @error('harga_beli')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror                 
</div>
</div>              
 <div class="form-group">                
 <label  class="control-label  col-sm-2">Harga Jual</label>                
 <div class="col-sm-10">                  
 <input  type="text" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" value="{{ $produk->harga_jual }}">                
                            @error('harga_jual')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror                 
</div>               
</div>               
<div class="form-group">                 
<div class="col-sm-offset-2 col-sm-10">   
               
<button  type="submit"  class="btn  btn-primary">Update</button>         
<a  href="{{ url('/produk/index') }}" class="btn btn-warning">Batal</a>     
</div>                
</div>            
 </form>           
</div>        
 </div>       
</div>    
 </div> 
</div> 
@endsection
