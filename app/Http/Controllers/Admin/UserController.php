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
        $res_user = DB::table('users as u')
            ->leftJoin('urole as r', 'u.level', '=', 'r.id')
            ->select('u.id', 'u.nama', 'r.role')
            ->get();
        $title = 'Data User';
        return view('users.list-user', compact('title', 'res_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res_role = DB::select('select * from urole');
        return view('users.add-user', compact('res_role'));
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
            'nama' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('user.list')->with('success', 'Tambah Data Berhasil');
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
        $res_find = DB::select('select * from users where id=' . $id);
        $find = $res_find[0];
        $res_role = DB::select('select * from urole');
        return view('users.edit-user', compact('find', 'res_role'));
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
            'password' => 'same:confirm-password',
            'level' => 'required'
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->level = $request->level;

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
        $resdelete = DB::delete('DELETE FROM users WHERE id=' . $id . ';');

        if ($resdelete) {
            return redirect()
                ->route('user.list')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
