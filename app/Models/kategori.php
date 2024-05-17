<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use App\Models\produk;


class kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    
    public function get_produk()
    {

        return $this->hasMany(produk::class);//arahkan ke table child produk
    
    }

}

