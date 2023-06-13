<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'login'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout-dashboard');


// Auth::routes();

/*All Admin Routes List*/
Route::middleware(['user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*All Guru Routes List*/
Route::middleware(['user-access:guru'])->group(function () {

    Route::get('/guru/home', [HomeController::class, 'guruHome'])->name('guru.home');
});

/*All Siswa Routes List*/
Route::middleware(['user-access:siswa'])->group(function () {

    Route::get('/siswa/home', [HomeController::class, 'siswaHome'])->name('siswa.home');
});

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/identitas', [HomeController::class, 'identitas'])->name('identitas');

    // Penilaian
    Route::get('/data-penilaian', [PenilaianController::class, 'index'])->name('index-penilaian');
    Route::post('/data-penilaian/update/{id}', [PenilaianController::class, 'processUpdate'])->name('edit-penilaian');

    // Soal
    Route::get('/soal', [SoalController::class, 'index'])->name('index-soal');
    Route::get('/soal/form', [SoalController::class, 'form'])->name('form-soal');
    Route::post('/soal/create/add', [SoalController::class, 'addNew'])->name('add-soal');
    Route::get('/soal/preview/{id}', [SoalController::class, 'preview'])->name('preview-soal');
    Route::get('/soal/edit/{id}', [SoalController::class, 'edit'])->name('edit-soal');
    Route::post('/soal/update/{id}', [SoalController::class, 'processUpdate'])->name('update-soal');
    Route::get('/soal/delete/{id}', [SoalController::class, 'delete'])->name('delete-soal');

    Route::get('/hal_soal', [SoalController::class, 'soal'])->name('soal-siswa');
    Route::post('/hal_soal/send_answer', [SoalController::class, 'addAnswer'])->name('send-answer');
    Route::get('/hal_hasil', [SoalController::class, 'hasil'])->name('hasil-siswa');

    // Dosen
    Route::get('/data-dosen', [DosenController::class, 'index'])->name('index-dosen');
    Route::post('/data-dosen/create', [DosenController::class, 'addNew'])->name('add-dosen');
    Route::post('/data-dosen/update/{id}', [DosenController::class, 'processUpdate'])->name('edit-dosen');
    Route::get('/data-dosen/delete/{id}', [DosenController::class, 'delete'])->name('delete-dosen');

    // Siswa
    Route::get('/data-siswa', [SiswaController::class, 'index'])->name('index-siswa');
    Route::post('/data-siswa/create', [SiswaController::class, 'addNew'])->name('add-siswa');
    Route::post('/data-siswa/update/{id}', [SiswaController::class, 'processUpdate'])->name('edit-siswa');
    Route::get('/data-siswa/delete/{id}', [SiswaController::class, 'delete'])->name('delete-siswa');

    // Kelas
    Route::get('/data-kelas', [KelasController::class, 'index'])->name('index-kelas');
    Route::post('/data-kelas/create', [KelasController::class, 'addNew'])->name('add-kelas');
    Route::post('/data-kelas/update/{id}', [KelasController::class, 'processUpdate'])->name('edit-kelas');
    Route::get('/data-kelas/delete/{id}', [KelasController::class, 'delete'])->name('delete-kelas');

    // Mata Kuliah
    Route::get('/data-matkul', [MatkulController::class, 'index'])->name('index-matkul');
    Route::post('/data-matkul/create', [MatkulController::class, 'addNew'])->name('add-matkul');
    Route::post('/data-matkul/update/{id}', [MatkulController::class, 'processUpdate'])->name('edit-matkul');
    Route::get('/data-matkul/delete/{id}', [MatkulController::class, 'delete'])->name('delete-matkul');

    // User
    Route::get('/data-user', [UserController::class, 'index'])->name('index-user');
    Route::post('/data-user/create', [UserController::class, 'addNew'])->name('add-user');
    Route::post('/data-user/update/{id}', [UserController::class, 'processUpdate'])->name('edit-user');
    Route::get('/data-user/delete/{id}', [UserController::class, 'delete'])->name('delete-user');