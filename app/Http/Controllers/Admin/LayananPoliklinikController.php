<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan_poliklinik;

class LayananPoliklinikController extends Controller
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
    private function generateLayanan_poliklinikCode()
    {
        $latestLayanan_poliklinik = Layanan_poliklinik::latest('slug')->first();

        if (!$latestLayanan_poliklinik) {
            return 'LP001';
        }

        $lastNumber = intval(substr($latestLayanan_poliklinik->slug, 2));
        $newNumber = $lastNumber + 1;

        return 'LP' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }
    public function index()
    {
        $res_layanan_poli = Layanan_poliklinik::all();
        return view('admin.layanan_poli.list-layanan_poli', compact('res_layanan_poli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug = $this->generateLayanan_poliklinikCode();
        return view('admin.layanan_poli.add-layanan_poli', compact('slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'poliklinik' => 'required',
            'slug' => 'required',
            'ket' => 'required',
        ]);

        Layanan_poliklinik::create($validatedData);
        return redirect()
            ->route('layanan_poli.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('layanan_poli.list')->with("failed", "Data failed to added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Layanan_poliklinik::find($id);
        return view('admin.layanan_poli.show-layanan_poli', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Layanan_poliklinik::find($id);
        return view('admin.layanan_poli.edit-layanan_poli', compact('data'));
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
            'poliklinik' => 'required',
            'slug' => 'required',
            'ket' => 'required',
        ]);
        $input = $request->id;
        $data = Layanan_poliklinik::find($input);
        $data->poliklinik = $request->poliklinik;
        $data->slug = $request->slug;
        $data->ket = $request->ket;
        $data->update();
        if ($data) {
            return redirect()
                ->route('layanan_poli.list')->with("success-add", "Data successfully updated.");
        } else {
            return redirect()
                ->route('layanan_poli.list')->with("failed", "Data failed to update.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Layanan_poliklinik::destroy($id);
        return redirect()->back();
    }
}
