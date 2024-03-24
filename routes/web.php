<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BlogGuestController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\GaleriCategoryController;
use App\Http\Controllers\Admin\LayananPoliklinikController;
use App\Http\Controllers\Admin\FasilitasLayananController;
use App\Http\Controllers\Admin\JadwalDokterController;
use App\Http\Controllers\Admin\PartnershipController;

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

//Page Blog Category
Route::get('blogcategory/add', [BlogCategoryController::class, 'index'])->name('blogcategory.create');
Route::post('blogcategory/store', [BlogCategoryController::class, 'store'])->name('blogcategory.add');

//Page Galeri
Route::get('foto', [GaleriController::class, 'index'])->name('foto.list');
Route::get('foto/add', [GaleriController::class, 'create'])->name('foto.create');
Route::post('foto/store', [GaleriController::class, 'store'])->name('foto.add');
Route::get('foto/delete/{id}', [GaleriController::class, 'destroy'])->name('foto.destroy');

//Page Galeri Category
Route::get('fotocategory/add', [GaleriCategoryController::class, 'index'])->name('fotocategory.create');
Route::post('fotocategory/store', [GaleriCategoryController::class, 'store'])->name('fotocategory.add');

// //Page Dokter
Route::get('dokter', [DokterController::class, 'index'])->name('dokter.list');
Route::get('dokter/show/{id}', [DokterController::class, 'show'])->name('dokter.show');
Route::get('dokter/add', [DokterController::class, 'create'])->name('dokter.create');
Route::post('dokter/store', [DokterController::class, 'store'])->name('dokter.add');
Route::get('dokter/edit/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
Route::post('dokter/update/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::get('dokter/delete/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

//Page Fasilitas Layanan
Route::get('fasilitas_layanan', [FasilitasLayananController::class, 'index'])->name('fasilitas_layanan.list');
Route::get('fasilitas_layanan/show/{id}', [FasilitasLayananController::class, 'show'])->name('fasilitas_layanan.show');
Route::get('fasilitas_layanan/add', [FasilitasLayananController::class, 'create'])->name('fasilitas_layanan.create');
Route::post('fasilitas_layanan/store', [FasilitasLayananController::class, 'store'])->name('fasilitas_layanan.add');
Route::get('fasilitas_layanan/edit/{id}', [FasilitasLayananController::class, 'edit'])->name('fasilitas_layanan.edit');
Route::post('fasilitas_layanan/update/{id}', [FasilitasLayananController::class, 'update'])->name('fasilitas_layanan.update');
Route::get('fasilitas_layanan/delete/{id}', [FasilitasLayananController::class, 'destroy'])->name('fasilitas_layanan.destroy');

//Page Layanan Poliklinik
Route::get('layanan_poli', [LayananPoliklinikController::class, 'index'])->name('layanan_poli.list');
Route::get('layanan_poli/show/{id}', [LayananPoliklinikController::class, 'show'])->name('layanan_poli.show');
Route::get('layanan_poli/add', [LayananPoliklinikController::class, 'create'])->name('layanan_poli.create');
Route::post('layanan_poli/store', [LayananPoliklinikController::class, 'store'])->name('layanan_poli.add');
Route::get('layanan_poli/edit/{id}', [LayananPoliklinikController::class, 'edit'])->name('layanan_poli.edit');
Route::post('layanan_poli/update/{id}', [LayananPoliklinikController::class, 'update'])->name('layanan_poli.update');
Route::get('layanan_poli/delete/{id}', [LayananPoliklinikController::class, 'destroy'])->name('layanan_poli.destroy');

//Page Jadwal Dokter
Route::get('jadwal_dokter/edit_jadwal/{id}', [JadwalDokterController::class, 'edit_jadwal'])->name('jadwal_dokter.list');
Route::get('jadwal_dokter/add', [JadwalDokterController::class, 'index'])->name('jadwal_dokter.create');
Route::post('jadwal_dokter/store', [JadwalDokterController::class, 'store'])->name('jadwal_dokter.add');
Route::get('jadwal_dokter/edit/{id}', [JadwalDokterController::class, 'edit'])->name('jadwal_dokter.edit');
Route::post('jadwal_dokter/update/{id}', [JadwalDokterController::class, 'update'])->name('jadwal_dokter.update');

//Page Partnership
Route::get('partner', [PartnershipController::class, 'index'])->name('partner.list');
Route::get('partner/add', [PartnershipController::class, 'create'])->name('partner.create');
Route::post('partner/store', [PartnershipController::class, 'store'])->name('partner.add');
Route::get('partner/delete/{id}', [PartnershipController::class, 'destroy'])->name('partner.destroy');


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
