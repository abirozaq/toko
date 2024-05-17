
@extends('layouts.app')
@section('content')
<!-- CSS Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<div class="container">     
    <div class="row">       
        <div class="col-md-12">         
            <div class="panel panel-default">     
                <h1>Data Produk</h1>        
                <div class="panel-head container-fluid" style="margin-top: 10px;">            
                <a class="btn btn-success" href="{{ url('/produk/create') }}">Tambah Produk</a>              
                </div>  
                <div class="panel-body">             
                    <table id="products-table" class="table table-striped">       
                        <thead>                 
                            <tr>                  
                                <th>No</th>   
                                <!-- <th>ID</th>             -->
                                <th>Nama</th>                  
                                <th>Kategori</th>                   
                                <th>Qty</th>                   
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>                   
                                <th>Dibuat Pada</th>                   
                                <th>Diedit Pada</th>                   
                                <th  colspan="3"  style="text-align: center;">Aksi</th>                 
                            </tr>               
                        </thead>               
                        <tbody>                 
                            @foreach ($produk as $i => $p)                   
                            <tr>                    
                                <td>{{ $i+1 }}</td>    
                                <!-- <td>{{ $p->id }}</td>                  -->
                                <td>{{ $p->nama }}</td>
                                <td>{{ ($p->get_kategori != null) ? $p->get_kategori->kategori : '' }}</td>                               
                                <td>{{ $p->qty }}</td>                     
                                <td>{{ $p->harga_beli }}</td>                     
                                <td>{{ $p->harga_jual }}</td>                    
                                <td>{{ $p->created_at }}</td>                     
                                <td>{{ $p->updated_at }}</td>    
                                               
                                
                                <td>
                                    <a  class="btn  btn-primary" href="{{ url('/produk/show', $p->id) }}" > Detail</a>     
                                </td>  
                                <td>
                                    <a  class="btn  btn-warning" href="{{ url('/produk/edit/'. $p->id) }}">Edit</a>

                                </td> 
                                <td>
<!--                                     <form  method="post" action="{{ url('/produk/delete',$p->id) }}">                        
                                        {{ csrf_field() }}                         
                                        <input  type="hidden" name="_method" value="DELETE">                         
                                        <button  class="btn btn-danger" type="submit">Hapus</button>                       
                                    </form>       -->   
                                    {{ csrf_field() }} 
                                    <a onclick="return confirm('Yakin Data Dihapus?')" class="btn btn-danger" href="{{ url('/produk/delete',$p->id) }}">Hapus</a>                    
                                </td>                     
                
                            </tr>                 
                            @endforeach               
                        </tbody>            
                    </table>              
                </div>         
            </div>      
        </div>     
   </div> 
</div> 
@endsection
