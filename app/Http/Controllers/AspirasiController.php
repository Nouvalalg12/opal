<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiController extends Controller {
    public function store(Request $r){
        Aspirasi::create([
            'id_user'=>session('user')->id_user,
            'id_kategori'=>$r->id_kategori,
            'judul'=>$r->judul,
            'deskripsi'=>$r->deskripsi,
            'tanggal'=>date('Y-m-d'),
            'status'=>'Baru'
        ]);
        return redirect('/siswa');
    }
}
