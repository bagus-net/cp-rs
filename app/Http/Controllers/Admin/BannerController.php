<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
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
        $res_banner = Banner::all();
        return view('admin.banner.list-banner', compact('res_banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.add-banner');
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
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            'banner_title' => 'required'
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time()  . '.' . $file->getClientOriginalExtension();
            $folderPath = '/banner-image/';
            $file->storeAs($folderPath, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = " ";
        }
        $transaksi = Banner::create($data);
        return redirect()
            ->route('banner.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('banner.list')->with("failed", "Data failed to added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Banner::find($id);
        return view('admin.banner.show-banner', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Banner::find($id);
        return view('admin.banner.edit-banner', compact('data'));
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
            'image' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $input = $request->id;
        $data = Banner::find($input);
        $data->banner_title = $request->banner_title;
        $data->fill($request->except(['image']));
        $folderPathImage = '/banner-image/';

        if ($request->hasFile('image')) {
            $data->image = $this->handleImageUpload($request->file('image'), $folderPathImage, $data->image);
        }
        $data->update();
        if ($data) {
            return redirect()
                ->route('banner.list')->with("success-add", "Data successfully updated.");
        } else {
            return redirect()
                ->route('banner.list')->with("failed", "Data failed to update.");
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
        Banner::destroy($id);
        return redirect()->back();
    }
}
