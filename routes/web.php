<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MonografiHukumController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\SekapurSirihController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\YurisprudensiController;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/tentang/{slug}', [LandingController::class, 'tentang'])->name('landing.tentang');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // SETTINGS
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.list');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.list');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');


    // BERANDA
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.list');
    Route::get('/khusus', [ArticleController::class, 'indexKhusus'])->name('articles.index-khusus');
    Route::get('/khusus/{slug}', [ArticleController::class, 'showKhusus'])->name('articles.show-khusus');
    Route::get('/berita/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles', [ArticleController::class, 'destroy'])->name('articles.destroy');

    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.list');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::get('/agenda/{agenda}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
    Route::post('/agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda', [AgendaController::class, 'destroy'])->name('agenda.destroy');



    // DOKUMEN
    Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan.list');
    Route::get('/peraturan/create', [PeraturanController::class, 'create'])->name('peraturan.create');
    Route::post('/peraturan', [PeraturanController::class, 'store'])->name('peraturan.store');
    Route::get('/peraturan/{id}/edit', [PeraturanController::class, 'edit'])->name('peraturan.edit');
    Route::post('/peraturan/{id}', [PeraturanController::class, 'update'])->name('peraturan.update');
    Route::delete('/peraturan', [PeraturanController::class, 'destroy'])->name('peraturan.destroy');

    Route::get('/monografi-hukum', [MonografiHukumController::class, 'index'])->name('monografi-hukum.list');
    Route::get('/monografi-hukum/create', [MonografiHukumController::class, 'create'])->name('monografi-hukum.create');
    Route::post('/monografi-hukum', [MonografiHukumController::class, 'store'])->name('monografi-hukum.store');
    Route::get('/monografi-hukum/{id}/edit', [MonografiHukumController::class, 'edit'])->name('monografi-hukum.edit');
    Route::post('/monografi-hukum/{id}', [MonografiHukumController::class, 'update'])->name('monografi-hukum.update');
    Route::delete('/monografi-hukum', [MonografiHukumController::class, 'destroy'])->name('monografi-hukum.destroy');

    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.list');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::post('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel', [ArtikelController::class, 'destroy'])->name('artikel.destroy');

    Route::get('/yurisprudensi', [YurisprudensiController::class, 'index'])->name('yurisprudensi.list');
    Route::get('/yurisprudensi/create', [YurisprudensiController::class, 'create'])->name('yurisprudensi.create');
    Route::post('/yurisprudensi', [YurisprudensiController::class, 'store'])->name('yurisprudensi.store');
    Route::get('/yurisprudensi/{id}/edit', [YurisprudensiController::class, 'edit'])->name('yurisprudensi.edit');
    Route::post('/yurisprudensi/{id}', [YurisprudensiController::class, 'update'])->name('yurisprudensi.update');
    Route::delete('/yurisprudensi', [YurisprudensiController::class, 'destroy'])->name('yurisprudensi.destroy');


    // TENTANG
    Route::get('/sejarah/create', [SejarahController::class, 'create'])->name('sejarah.create');
    Route::post('/sejarah', [SejarahController::class, 'store'])->name('sejarah.store');

    Route::get('/sambutan/create', [SekapurSirihController::class, 'create'])->name('sambutan.create');
    Route::post('/sambutan', [SekapurSirihController::class, 'store'])->name('sambutan.store');

    Route::get('/visi-misi/create', [VisiMisiController::class, 'create'])->name('visi-misi.create');
    Route::post('/visi-misi', [VisiMisiController::class, 'store'])->name('visi-misi.store');

    Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('struktur-organisasi.list');
    Route::get('/struktur-organisasi/create', [StrukturOrganisasiController::class, 'create'])->name('struktur-organisasi.create');
    Route::post('/struktur-organisasi', [StrukturOrganisasiController::class, 'store'])->name('struktur-organisasi.store');
    Route::get('/struktur-organisasi/{id}/edit', [StrukturOrganisasiController::class, 'edit'])->name('struktur-organisasi.edit');
    Route::post('/struktur-organisasi/{id}', [StrukturOrganisasiController::class, 'update'])->name('struktur-organisasi.update');
    Route::delete('/struktur-organisasi', [StrukturOrganisasiController::class, 'destroy'])->name('struktur-organisasi.destroy');

    Route::get('/slider', [SliderController::class, 'index'])->name('slider.list');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider', [SliderController::class, 'destroy'])->name('slider.destroy');

    Route::get('/infografis', [InfografisController::class, 'index'])->name('infografis.list');
    Route::get('/infografis/create', [InfografisController::class, 'create'])->name('infografis.create');
    Route::post('/infografis', [InfografisController::class, 'store'])->name('infografis.store');
    Route::get('/infografis/{id}/edit', [InfografisController::class, 'edit'])->name('infografis.edit');
    Route::post('/infografis/{id}', [InfografisController::class, 'update'])->name('infografis.update');
    Route::delete('/infografis', [InfografisController::class, 'destroy'])->name('infografis.destroy');


    // GALERI //
    // FOTO
    Route::get('/foto', [GaleriController::class, 'indexFoto'])->name('foto.list');
    Route::get('/foto/create', [GaleriController::class, 'createFoto'])->name('foto.create');
    Route::post('/foto', [GaleriController::class, 'storeFoto'])->name('foto.store');
    Route::get('/foto/{id}/edit', [GaleriController::class, 'editFoto'])->name('foto.edit');
    Route::post('/foto/{id}', [GaleriController::class, 'updateFoto'])->name('foto.update');
    Route::delete('/foto', [GaleriController::class, 'destroyFoto'])->name('foto.destroy');

    // VIDEO
    Route::get('/video', [GaleriController::class, 'indexVideo'])->name('video.list');
    Route::get('/video/create', [GaleriController::class, 'createVideo'])->name('video.create');
    Route::post('/video', [GaleriController::class, 'storeVideo'])->name('video.store');
    Route::get('/video/{id}/edit', [GaleriController::class, 'editVideo'])->name('video.edit');
    Route::post('/video/{id}', [GaleriController::class, 'updateVideo'])->name('video.update');
    Route::delete('/video', [GaleriController::class, 'destroyVideo'])->name('video.destroy');
});

require __DIR__ . '/auth.php';
