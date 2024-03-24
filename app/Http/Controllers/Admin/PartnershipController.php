<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partnership;
use Illuminate\Support\Facades\Storage;

class PartnershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $res_partnership = Partnership::all();
        return view('admin.partnership.list-partnership', compact('res_partnership'));
    }

    public function create()
    {
        return view('admin.partnership.add-partnership');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_partner' => 'required',
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time()  . '.' . $file->getClientOriginalExtension();
            $folderPath = '/partnership-image/';
            $file->storeAs($folderPath, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = " ";
        }

        $transaksi = Partnership::create($data);

        return redirect()
            ->route('partner.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('partner.list')->with("failed", "Data failed to added.");
    }

    public function destroy($id)
    {
        Partnership::destroy($id);
        return redirect()->back();
    }
}
