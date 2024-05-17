<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'produks';
    // protected $guarded = ['id','created_at','updated_at'];
    protected $guarded = ['id'];
    

 
    public function get_kategori()
    {
        // relasi dengan tabel produk
        return $this->belongsTo('App\Models\kategori', 'id_kategori', 'id');

    }

}
