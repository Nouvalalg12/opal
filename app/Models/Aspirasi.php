<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';
    protected $primaryKey = 'id_aspirasi';

    protected $fillable = [
        'id_user',
        'id_kategori',
        'judul',
        'deskripsi',
        'tanggal',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
