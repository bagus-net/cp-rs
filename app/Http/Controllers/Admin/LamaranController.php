<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lamaran;
use App\Models\Lowongan;

class LamaranController extends Controller
{
    public function index(Lowongan $lowongan)
    {
        return view('admin.lowongan.list-lamaran', [
            'tittle' => 'Lowongan',
            'pelamar' => Lamaran::where('lowongan_id', $lowongan->id)->latest()->get(),
            'data' => $lowongan
        ]);
    }

    public function destroy($id)
    {
        Lowongan::destroy($id);
        return redirect()->route('lowongan.list');
    }
}
