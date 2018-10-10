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
    Route::get('/siswa',function () {return view('app');});
    Route::get('/siswa/detail/{id}',function () {return view('app');});
    Route::get('/admin',function () {return view('app');});
    Route::get('/slider',function () {return view('app');});
    Route::get('/karyaSiswa',function () {return view('app');});
    Route::get('/karyaSiswa/detail',function () {return view('app');});
});