<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriGaleri;

class GaleriCategoryController extends Controller
{
    public function index()
    {
        return view('admin.galeri.add-galericategory');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'galeri_kategori' => 'required'
            ]
        );

        KategoriGaleri::create($validatedData);

        return redirect()
            ->route('foto.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('foto.list')->with("failed", "Data failed to added.");
    }
}
