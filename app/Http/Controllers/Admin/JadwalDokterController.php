<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalDokter;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;

class JadwalDokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $res_layanan_polikliniks = DB::select('select * from layanan_polikliniks');
        $res_dokters = DB::select('select * from dokters');
        return view('admin.jadwal_dokter.add-jadwal_dokter', compact('res_layanan_polikliniks', 'res_dokters'));
    }

    public function edit_jadwal($id)
    {
        $jadwals = DB::select('SELECT jd.`id`,jd.`hari`,jd.`dari`,jd.`sampai`,d.`nama` AS nama_dokter ,lp.`poliklinik` AS poliklinik
        FROM jadwal_dokters jd
        LEFT JOIN dokters d ON jd.`id`=d.`id`
        LEFT JOIN layanan_polikliniks lp ON jd.`id`=lp.`id`
        WHERE jd.`dokter_id`= ' . $id);

        return view('admin.jadwal_dokter.edit-list_jadwal', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dokter_id' => 'required',
            'poliklinik_id' => 'required',
            'hari' => 'required|max:255',
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        JadwalDokter::create($validatedData);

        return redirect()
            ->route('dokter.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('dokter.list')->with("failed", "Data failed to added.");
    }

    public function edit($id)
    {
        $res_find = DB::select('select * from jadwal_dokters where id=' . $id);
        $find = $res_find[0];
        $res_layanan_polikliniks = DB::select('select * from layanan_polikliniks');
        $res_dokters = DB::select('select * from dokters');
        return view('admin.jadwal_dokter.edit-jadwal_dokter', compact('find', 'res_layanan_polikliniks', 'res_dokters'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'dokter_id' => 'required',
            'poliklinik_id' => 'required',
            'hari' => 'required|max:255',
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        JadwalDokter::where('id', $id)
            ->update($validatedData);

        return redirect()
            ->route('dokter.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('dokter.list')->with("failed", "Data failed to added.");
    }
}
