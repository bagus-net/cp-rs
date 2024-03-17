<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Blog;
use App\Models\Layanan_poliklinik;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $dokter = Dokter::all();
        $blog = Blog::all();
        $layanan_poliklinik = Layanan_poliklinik::all();
        $galeri = Galeri::all();

        $jmlh_dokter = $dokter->count();
        $jmlh_layanan_poliklinik = $layanan_poliklinik->count();
        $jmlh_blog = $blog->count();
        $jmlh_galeri = $galeri->count();

        return view('admin.dashboard', compact('jmlh_dokter', 'jmlh_layanan_poliklinik', 'jmlh_blog', 'jmlh_galeri'));
    }
}
