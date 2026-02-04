<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    // =========================
    // SIMPAN ASPIRASI SISWA
    // =========================
    public function store(Request $r)
    {
        Aspirasi::create([
            'id_user'     => session('user')->id_user,
            'id_kategori' => $r->id_kategori,
            'judul'       => $r->judul,
            'deskripsi'   => $r->deskripsi,
            'tanggal'     => date('Y-m-d'),
            'status'      => 'Baru'
        ]);

        return redirect('/siswa')->with('success', 'Aspirasi berhasil dikirim');
    }

    // =========================
    // HALAMAN HOME SISWA
    // =========================
    public function siswa()
    {
        $aspirasi = Aspirasi::where('id_user', session('user')->id_user)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('siswa', compact('aspirasi'));
    }

    // =========================
    // HAPUS ASPIRASI OLEH SISWA
    // =========================
    public function hapusSiswa($id)
    {
        $aspirasi = Aspirasi::where('id_aspirasi', $id)
            ->where('id_user', session('user')->id_user)
            ->firstOrFail();

        // siswa hanya boleh hapus jika status BARU
        if ($aspirasi->status !== 'Baru') {
            return back()->with('error', 'Pengaduan tidak bisa dihapus karena sudah diproses');
        }

        $aspirasi->delete();
        return back()->with('success', 'Pengaduan berhasil dihapus');
    }
}
