<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogCategory;
// use App\Http\Controllers\BlogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User_Controller;
// use App\Http\Controllers\BannerController;
// use App\Http\Controllers\DokterController;
use App\Http\Controllers\FolderController;
// use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ElibraryController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\BlogGuestController;
use App\Http\Controllers\jadwalDokterController;
use App\Http\Controllers\LayananImageController;
use App\Http\Controllers\LayananDetailController;
use App\Http\Controllers\FasilitasLayananController;
use App\Http\Controllers\LayananUnggulanController;
use App\Http\Controllers\LayananPoliklinikController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\KategoriGaleriController;
use App\Http\Controllers\YtLinkController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\DokterController;

//Login Minible
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout']);

//Admin Minible
//Page Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Page Banner
Route::get('banner', [BannerController::class, 'index'])->name('banner.list');
Route::get('banner/show/{id}', [BannerController::class, 'show'])->name('banner.show');
Route::get('banner/add', [BannerController::class, 'create'])->name('banner.create');
Route::post('banner/store', [BannerController::class, 'store'])->name('banner.add');
Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
Route::post('banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
Route::get('banner/delete/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

//Page User
Route::get('user', [UserController::class, 'index'])->name('user.list');
Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('user/add', [UserController::class, 'create'])->name('user.create');
Route::post('user/store', [UserController::class, 'store'])->name('user.add');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//Page Blog
Route::get('blog', [BlogController::class, 'index'])->name('blog.list');
Route::get('blog/show/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('blog/add', [BlogController::class, 'create'])->name('blog.create');
Route::post('blog/store', [BlogController::class, 'store'])->name('blog.add');
Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

//Page Galeri
Route::get('foto', [GaleriController::class, 'index'])->name('foto.list');
Route::get('foto/add', [GaleriController::class, 'create'])->name('foto.create');
Route::post('foto/store', [GaleriController::class, 'store'])->name('foto.add');
Route::get('foto/delete/{id}', [GaleriController::class, 'destroy'])->name('foto.destroy');

//Page Dokter
Route::get('dokter', [DokterController::class, 'index'])->name('dokter.list');
Route::get('dokter/show/{id}', [DokterController::class, 'show'])->name('dokter.show');
Route::get('dokter/add', [DokterController::class, 'create'])->name('dokter.create');
Route::post('dokter/store', [DokterController::class, 'store'])->name('dokter.add');
Route::get('dokter/edit/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
Route::post('dokter/update/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::get('dokter/delete/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');


//------------------------------------------------------------------------------------------------------//

// halaman guest
Route::get('/', [MainController::class, 'index'])->middleware('guest');
Route::get('/tentang', [MainController::class, 'tentang'])->middleware('guest');


//blog guest
Route::get('/artikel', [BlogGuestController::class, 'index'])->middleware('guest');
Route::get('/artikel/{blog}', [BlogGuestController::class, 'show'])->middleware('guest');

// dokter guest
Route::get('/dokter/profil', [MainController::class, 'profilDokter'])->middleware('guest');
Route::get('/dokter/jadwal', [MainController::class, 'jadwalDokter'])->middleware('guest');
Route::get('/dokter/profil/{dokter}', [MainController::class, 'profilDokterDetail'])->middleware('guest');

// layanan guest
Route::get('/services', [MainController::class, 'layananIndex'])->middleware('guest');
Route::get('/services/detail/{layanan}', [MainController::class, 'layananDetail'])->middleware('guest');
Route::get('/services/layanan-poliklinik', [MainController::class, 'layananPoliklinik'])->middleware('guest');
Route::get('/services/layanan-poliklinik/detail/{layanan_poliklinik}', [MainController::class, 'layananPoliklinikDetail'])->middleware('guest');
Route::get('/services/fasilitas-layanan', [MainController::class, 'fasilitasLayanan'])->middleware('guest');

// elibrary
Route::get('/e-library', [MainController::class, 'elibraryIndex'])->middleware('guest');

// karir guest
Route::get('/karir', [MainController::class, 'karirIndex'])->middleware('guest');
Route::get('/karir/{lowongan}', [MainController::class, 'karirShow'])->middleware('guest');
Route::post('/karir', [MainController::class, 'store'])->middleware('guest');

// galeri guest
Route::get('/galeri', [MainController::class, 'galeriIndex'])->middleware('guest');

// partnership
Route::get('/partnership', [MainController::class, 'partnerIndex'])->middleware('guest');

// <-- Bagian Admin -->

// form login dan logout
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'auth']);
// Route::post('/logout', [LoginController::class, 'logout']);


// Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

// Blog
// Route::get('/blog', [BlogController::class, 'index'])->middleware('auth');
// Route::get('/blogCreate', [BlogController::class, 'create'])->middleware('auth');
// Route::post('/blogCreate', [BlogController::class, 'store']);

// ..............
Route::resource('/dashboard/blog', BlogController::class)->middleware('auth');

Route::get('/blogCategory', [BlogCategory::class, 'index'])->middleware('auth');
Route::post('/blogCategory', [BlogCategory::class, 'store']);

// users
Route::resource('/dashboard/user', User_Controller::class)->middleware('auth');

// banner
// Route::resource('/dashboard/banner', BannerController::class)->middleware('auth');

// Dokter
Route::resource('/dashboard/dokter', DokterController::class)->middleware('auth');

// jadwal dokter
Route::get('/dashboard/dokter-jadwal/{dokter}', [jadwalDokterController::class, 'index'])->middleware('auth');
Route::get('/dashboard/jadwal-edit/{id}', [jadwalDokterController::class, 'edit'])->middleware('auth');
Route::resource('/dashboard/jadwal-edit', jadwalDokterController::class,)->middleware('auth');
Route::post('/dashboard/dokter-jadwal', [jadwalDokterController::class, 'store'])->middleware('auth');

// lowongan
Route::resource('/dashboard/lowongan', LowonganController::class)->middleware('auth');
Route::get('/dashboard/lamaran/{lowongan}', [LamaranController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/lamaran', LamaranController::class)->middleware('auth');

// layanan-poliklinik
Route::resource('/dashboard/layanan-poliklinik', LayananPoliklinikController::class)->middleware('auth');

// fasilitas layanan
Route::resource('/dashboard/fasilitas-layanan', FasilitasLayananController::class)->middleware('auth');

// layanan Unggulan
Route::resource('/dashboard/layanan-unggulan', layananUnggulanController::class)->middleware('auth');

// layanan
Route::resource('/dashboard/layananImage', LayananImageController::class)->middleware('auth');
Route::get('/dashboard/layanan/detail/{layanan_poliklinik}', [LayananDetailController::class, 'index'])->middleware('auth');

// galeri
// Route::resource('/dashboard/galeri', GaleriController::class)->middleware('auth');
Route::resource('/dashboard/galeri-kategori', KategoriGaleriController::class)->middleware('auth');

// e-library
Route::resource('/dashboard/e-library', ElibraryController::class)->middleware('auth');
Route::resource('/dashboard/e-library/folder', FolderController::class)->middleware('auth');

// partnership
Route::resource('/dashboard/partnership', PartnershipController::class)->middleware('auth');

// yt links
Route::resource('/dashboard/yt', YtLinkController::class)->middleware('auth');
