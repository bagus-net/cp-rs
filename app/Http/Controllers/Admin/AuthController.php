<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('adminView/login', [
            'tittle' => 'Halaman Login'
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function setting()
    {
        return view('setting');
    }

    public function edituser($id)
    {
        $res_find = DB::select('select * from users where id=' . $id);
        $find = $res_find[0];
        return view('users.edit-user', compact('find'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'same:confirm-password'
        ]);

        $user = User::find($id);
        $user->username = $request->username;

        // Perbarui password jika ada perubahan
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        //dd($input);
        return redirect()->route('user.edit')
            ->with('success', 'User updated successfully');
    }
}
