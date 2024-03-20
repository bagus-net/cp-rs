<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lowongan;

class LowonganController extends Controller
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
    private function generateLowonganCode()
    {
        $latestLowongan = Lowongan::latest('slug')->first();

        if (!$latestLowongan) {
            return 'LKR001';
        }

        $lastNumber = intval(substr($latestLowongan->slug, 2));
        $newNumber = $lastNumber + 1;

        return 'LKR' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }
    public function index()
    {
        $res_lowongan = Lowongan::all();
        return view('admin.lowongan.list-lowongan', compact('res_lowongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug = $this->generateLowonganCode();
        return view('admin.lowongan.add-lowongan', compact('slug'));
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
            'posisi' => 'required',
            'slug' => 'required',
            'persyaratan' => 'required',
            'excerpt' => 'required',
            'periode_akhir' => 'required',
        ]);

        Lowongan::create($validatedData);
        return redirect()
            ->route('lowongan.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('lowongan.list')->with("failed", "Data failed to added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Lowongan::find($id);
        return view('admin.lowongan.show-lowongan', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lowongan::find($id);
        return view('admin.lowongan.edit-lowongan', compact('data'));
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
            'posisi' => 'required',
            'slug' => 'required',
            'persyaratan' => 'required',
            'excerpt' => 'required',
            'periode_akhir' => 'required',
        ]);
        $input = $request->id;
        $data = Lowongan::find($input);
        $data->posisi = $request->posisi;
        $data->slug = $request->slug;
        $data->persyaratan = $request->persyaratan;
        $data->excerpt = $request->excerpt;
        $data->periode_akhir = $request->periode_akhir;
        $data->update();
        if ($data) {
            return redirect()
                ->route('lowongan.list')->with("success-add", "Data successfully updated.");
        } else {
            return redirect()
                ->route('lowongan.list')->with("failed", "Data failed to update.");
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
        Lowongan::destroy($id);
        return redirect()->back();
    }
}
