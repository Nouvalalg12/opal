<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // =========================
    // DASHBOARD ADMIN
    // =========================
    public function index()
    {
        $aspirasi = Aspirasi::with('user')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin', compact('aspirasi'));
    }

    // =========================
    // UPDATE STATUS ASPIRASI
    // =========================
    public function konfirmasi(Request $request, $id)
    {
        $data = Aspirasi::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect('/admin')->with('success', 'Status berhasil diperbarui');
    }

    // =========================
    // HAPUS ASPIRASI OLEH ADMIN
    // =========================
    public function hapus($id)
    {
        Aspirasi::where('id_aspirasi', $id)->delete();
        return redirect('/admin')->with('success', 'Pengaduan berhasil dihapus');
    }
}
