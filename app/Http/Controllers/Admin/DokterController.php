<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function generateDokterCode()
    {
        $latestDokter = Dokter::latest('slug')->first();

        if (!$latestDokter) {
            return 'DOK001';
        }

        $lastNumber = intval(substr($latestDokter->slug, 2));
        $newNumber = $lastNumber + 1;

        return 'DOK' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

    public function index()
    {
        $res_dokter = DB::select('SELECT  d.`id`,d.`nama`,d.`slug`,d.`jenis_kelamin`,d.`no_hp`,d.`email`,d.`image`,lp.`poliklinik` AS poliklinik
        FROM dokters d
        LEFT JOIN layanan_polikliniks lp ON d.`poliklinik_id`=lp.`id`');
        return view('admin.dokter.list-dokter', compact('res_dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug = $this->generateDokterCode();
        $res_layanan_polikliniks = DB::select('select * from layanan_polikliniks');
        return view('admin.dokter.add-dokter', compact('res_layanan_polikliniks', 'slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            'slug' => 'required',
            'nama' => 'required',
            'poliklinik_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat_domisili' => 'required',
            'riwayat' => 'required',
        ]);

        $file = $request->file('image');
        $fileName = time()  . '.' . $file->getClientOriginalExtension();
        $folderPath = '/dokter-image/' . $request->slug;
        $file->storeAs($folderPath, $fileName);
        // $data['image'] = $fileName;

        Dokter::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'poliklinik_id' => $request->poliklinik_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'image' => $fileName,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat_domisili' => $request->alamat_domisili,
            'riwayat' => $request->riwayat,
            'image' => $fileName,
        ]);

        return redirect()
            ->route('dokter.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('dokter.list')->with("failed", "Data failed to added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res_find = DB::select('select * from dokters where id=' . $id);
        $find = $res_find[0];
        $res_layanan_polikliniks = DB::select('select * from layanan_polikliniks');
        $res_jadwal_dokters = DB::select('select * from jadwal_dokters');
        return view('admin.dokter.show-dokter', compact('find', 'res_jadwal_dokters', 'res_layanan_polikliniks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_find = DB::select('select * from dokters where id=' . $id);
        $find = $res_find[0];
        $res_layanan_polikliniks = DB::select('select * from layanan_polikliniks');
        $res_jadwal_dokters = DB::select('select * from jadwal_dokters');
        return view('admin.dokter.edit-dokter', compact('find', 'res_jadwal_dokters', 'res_layanan_polikliniks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
            'slug' => 'nullable',
            'nama' => 'nullable',
            'poliklinik_id' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'no_hp' => 'nullable',
            'email' => 'nullable',
            'alamat_domisili' => 'nullable',
            'riwayat' => 'nullable',
        ]);
        $input = $request->id;
        $data = Dokter::find($input);
        $data->nama = $request->nama;
        $data->slug = $request->slug;
        $data->poliklinik_id = $request->poliklinik_id;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->no_hp = $request->no_hp;
        $data->email = $request->email;
        $data->alamat_domisili = $request->alamat_domisili;
        $data->riwayat = $request->riwayat;
        $data->fill($request->except(['image']));
        $kodeSlug = $data['slug'];
        $folderPathImage = '/dokter-image/' . $kodeSlug;

        if ($request->hasFile('image')) {
            $data->image = $this->handleImageUpload($request->file('image'), $folderPathImage, $data->image);
        }
        $data->update();
        if ($data) {
            return redirect()
                ->route('dokter.list')->with("success-add", "Data successfully updated.");
        } else {
            return redirect()
                ->route('dokter.list')->with("failed", "Data failed to update.");
        }
    }

    private function handleImageUpload($file, $directory, $oldFileName    = null)
    {
        // Hapus file lama jika ada
        if ($oldFileName) {
            Storage::delete("/$directory/$oldFileName");
        }

        // Simpan file baru
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs("/$directory", $fileName);

        return $fileName;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dokter::destroy($id);
        return redirect()->back();
    }
}
