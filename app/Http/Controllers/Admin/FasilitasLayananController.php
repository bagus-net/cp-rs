<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Fasilitas_Layanan;

class FasilitasLayananController extends Controller
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
    private function generateFasilitas_LayananCode()
    {
        $latestFasilitas_Layanan = Fasilitas_Layanan::latest('slug')->first();

        if (!$latestFasilitas_Layanan) {
            return 'FL001';
        }

        $lastNumber = intval(substr($latestFasilitas_Layanan->slug, 2));
        $newNumber = $lastNumber + 1;

        return 'FL' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }
    public function index()
    {
        $res_fasilitas_layanan = Fasilitas_Layanan::all();
        return view('admin.fasilitas_layanan.list-fasilitas_layanan', compact('res_fasilitas_layanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug = $this->generateFasilitas_LayananCode();
        return view('admin.fasilitas_layanan.add-fasilitas_layanan', compact('slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_fasilitas' => 'required',
            'slug' => 'required',
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            'kategori' => 'required',
            'ket' => 'required',
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time()  . '.' . $file->getClientOriginalExtension();
            $folderPath = '/fasilitas_layanan-image/' . $request->slug;
            $file->storeAs($folderPath, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = " ";
        }
        $transaksi = Fasilitas_Layanan::create($data);
        return redirect()
            ->route('fasilitas_layanan.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('fasilitas_layanan.list')->with("failed", "Data failed to added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Fasilitas_Layanan::find($id);
        return view('admin.fasilitas_layanan.show-fasilitas_layanan', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fasilitas_Layanan::find($id);
        return view('admin.fasilitas_layanan.edit-fasilitas_layanan', compact('data'));
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
            'nama_fasilitas' => 'required',
            'slug' => 'required',
            'image' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
            'kategori' => 'required',
            'ket' => 'required',
        ]);
        $input = $request->id;
        $data = Fasilitas_Layanan::find($input);
        $data->nama_fasilitas = $request->nama_fasilitas;
        $data->slug = $request->slug;
        $data->kategori = $request->kategori;
        $data->ket = $request->ket;
        $data->fill($request->except(['image']));
        $kodeSlug = $data['slug'];
        $folderPathImage = '/fasilitas_layanan-image/' . $kodeSlug;

        if ($request->hasFile('image')) {
            $data->image = $this->handleImageUpload($request->file('image'), $folderPathImage, $data->image);
        }
        $data->update();
        if ($data) {
            return redirect()
                ->route('fasilitas_layanan.list')->with("success-add", "Data successfully updated.");
        } else {
            return redirect()
                ->route('fasilitas_layanan.list')->with("failed", "Data failed to update.");
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
        Fasilitas_Layanan::destroy($id);
        return redirect()->back();
    }
}
