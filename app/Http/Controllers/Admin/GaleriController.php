<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
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

    public function index()
    {
        $res_galeri = DB::select('SELECT  g.`id`,g.`title_galeri`,g.`image`,g.`slug`,g.`created_at`,kg.`galeri_kategori`AS kategori
        FROM galeris g
        LEFT JOIN kategori_galeris kg ON g.`kategori_id`=kg.`id`');
        return view('admin.galeri.list-galeri', compact('res_galeri'));
    }

    private function generateGaleriCode()
    {
        $latestGaleri = Galeri::latest('slug')->first();

        if (!$latestGaleri) {
            return 'G001';
        }

        $lastNumber = intval(substr($latestGaleri->slug, 2));
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        return 'G' . $newNumber;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug = $this->generateGaleriCode();
        $res_kategori_galeris = DB::select('select * from kategori_galeris');
        return view('admin.galeri.add-galeri', compact('res_kategori_galeris', 'slug'));
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
            'title_galeri' => 'required',
            'kategori_id' => 'required',
            'keterangan' => 'required'
        ]);

        $file = $request->file('image');
        $fileName = time()  . '.' . $file->getClientOriginalExtension();
        $folderPath = '/galeri-image/' . $request->slug;
        $file->storeAs($folderPath, $fileName);
        // $data['image'] = $fileName;

        Galeri::create([
            'title_galeri' => $request->title_galeri,
            'slug' => $request->slug,
            'kategori_id' => $request->kategori_id,
            'keterangan' => $request->keterangan,
            'image' => $fileName,
        ]);

        return redirect()
            ->route('foto.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('foto.list')->with("failed", "Data failed to added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Galeri::destroy($id);
        return redirect()->back();
    }
}
