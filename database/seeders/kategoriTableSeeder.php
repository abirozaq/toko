<?php

namespace Database\Seeders;
use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class kategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menambahkan data pada tabel kategori
        kategori::create(['kategori'=>'Katun', 'keterangan'=>'Jenis Kain Katun']);
        kategori::create(['kategori'=>'Semi Sutra', 'keterangan'=>'Jenis Kain Semi Sutra']);
        kategori::create(['kategori'=>'Sutra Alam', 'keterangan'=>'Jenis Kain Sutra Alam']);
    }
}
