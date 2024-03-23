<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $res_user = User::all();
        return view('admin.users.list-user', compact('res_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add-user', compact('res_role'));
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
            'nama' => 'required|max:255',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time()  . '.' . $file->getClientOriginalExtension();
            $folderPath = '/user-image/';
            $file->storeAs($folderPath, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = " ";
        }
        $transaksi = User::create($data);
        return redirect()
            ->route('user.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('user.list')->with("failed", "Data failed to added.");
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
        $find = User::find($id);
        return view('admin.users.edit-user', compact('find'));
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
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password'
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->email = $request->email;

        // Perbarui password jika ada perubahan
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        //dd($input);
        return redirect()->route('user.list')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
