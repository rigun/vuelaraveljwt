<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('app');});
Route::get('/login', function () {return view('app');});
Route::get('/dashboard', function () {return view('app');});
Route::get('/logout', function () {return view('app');});

Route::group(['prefix' => 'dashboard'],function(){
    Route::get('/',function () {return view('app');});
    Route::get('/post/Pengumuman',function () {return view('app');});
    Route::get('/post/Karya Siswa',function () {return view('app');});
    Route::get('/post/Kerjasama',function () {return view('app');});
    Route::get('/post/Fasilitas',function () {return view('app');});
    Route::get('/post/Mata Pelajaran',function () {return view('app');});
    Route::get('/post/Jadwal',function () {return view('app');});
    Route::get('/post/Kurikulum',function () {return view('app');});
    Route::get('/post/Peraturan Akademik',function () {return view('app');});
    Route::get('/post/Ekstrakurikuler',function () {return view('app');});
    Route::get('/post/Prestasi',function () {return view('app');});
    Route::get('/post/Sejarah',function () {return view('app');});
    Route::get('/post/Struktur Organisasi',function () {return view('app');});
    Route::get('/post/PPDB',function () {return view('app');});

    Route::get('/siswa',function () {return view('app');});
    Route::get('/siswa/detail/{id}',function () {return view('app');});
    Route::get('/profile/{id}',function () {return view('app');});
    Route::get('/admin',function () {return view('app');});
    Route::get('/slider',function () {return view('app');});
    Route::get('/karyaSiswa',function () {return view('app');});
    Route::get('/karyaSiswa/detail/create/{id}',function () {return view('app');});
    Route::get('/karyaSiswa/detail/update/{id}',function () {return view('app');});
    Route::get('/pengumuman',function () {return view('app');});
    Route::get('/pengumuman/detail/create/{id}',function () {return view('app');});
    Route::get('/pengumuman/detail/update/{id}',function () {return view('app');});
    Route::get('/prestasi',function () {return view('app');});
    Route::get('/prestasi/detail/create/{id}',function () {return view('app');});
    Route::get('/prestasi/detail/update/{id}',function () {return view('app');});
});

    Route::get('/Pengumuman',function () {return view('app');});
    Route::get('/Karya Siswa',function () {return view('app');});
    Route::get('/Kerjasama',function () {return view('app');});
    Route::get('/Fasilitas',function () {return view('app');});
    Route::get('/Mata Pelajaran',function () {return view('app');});
    Route::get('/Jadwal',function () {return view('app');});
    Route::get('/Kurikulum',function () {return view('app');});
    Route::get('/Peraturan Akademik',function () {return view('app');});
    Route::get('/Ekstrakurikuler',function () {return view('app');});
    Route::get('/Prestasi',function () {return view('app');});
    Route::get('/Sejarah',function () {return view('app');});
    Route::get('/Struktur Organisasi',function () {return view('app');});
    Route::get('/PPDB',function () {return view('app');});
    Route::get('/blog/{post}',function () {return view('app');});

    Route::get('/list/Karya Siswa',function () {return view('app');});
    Route::get('/list/Prestasi',function () {return view('app');});
    Route::get('/list/Pengumuman',function () {return view('app');});