<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $aspirasi = Aspirasi::with('user')->get();
        return view('admin', compact('aspirasi'));
    }

    public function konfirmasi(Request $request, $id)
    {
        $data = Aspirasi::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect('/admin');
    }
}
