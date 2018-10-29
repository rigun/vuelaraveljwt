<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');

    Route::get('/admin', 'AdminController@apiIndex');
    Route::post('/admin/create', 'AdminController@store');
    Route::patch('/admin/update/{id}', 'AdminController@update');
    Route::delete('/admin/delete/{id}', 'AdminController@destroy');

    Route::get('/siswa', 'UserController@apiIndex');
    Route::get('/siswa/detail/{id}', 'UserController@show');
    Route::post('/siswa/create','UserController@store');
    Route::patch('/siswa/update/{id}', 'UserController@update');
    Route::delete('/siswa/delete/{id}', 'UserController@destroy');
    Route::post('/uploadExcel', 'UserController@uploadExcel');

    Route::get('/importantpost/siswa/{kategori}', 'ImportantPostController@IndexSiswa');
    Route::get('/importantpost/detail/{id}/{kategori}', 'ImportantPostController@show');
    Route::post('/importantpost/create/{kategori}','ImportantPostController@store');
    Route::post('/importantpost/update/{id}', 'ImportantPostController@update');
    Route::post('/importantpost/update/siswa/{id}', 'ImportantPostController@updateSiswa');
    Route::delete('/importantpost/delete/{id}', 'ImportantPostController@destroy');

    Route::get('/posts/unique', 'PostController@apiCheckUnique');
    Route::get('/posts/detail/{id}', 'PostController@show');
    Route::post('/posts/create','PostController@store');
    Route::post('/posts/update/{id}','PostController@update');

    Route::get('/refresh', 'AuthController@refresh');

    Route::post('/images-save', 'UploadImagesController@store');
    Route::post('/images-save/post', 'UploadImagesController@storePost');
    Route::post('/images-save/slider/{id}', 'UploadImagesController@storeSlide');
    Route::delete('/images-delete/{id}', 'UploadImagesController@destroy');
    Route::get('/images-show', 'UploadImagesController@index');
    Route::get('/images-show/slider/', 'UploadImagesController@showSlide');

    Route::get('/count', 'PostController@getCount');
    Route::get('/countPost', 'PostController@getCountPost');
    Route::patch('/updatePassword/{id}', 'UserController@updatePassword');
    Route::patch('/firstLogin', 'UserController@firstLogin');
    Route::post('/storeProfile', 'UploadImagesController@storeProfile');
    Route::delete('/deleteProfile/{id}', 'UploadImagesController@destroyProfile');

    Route::post('/file', 'LinkFileController@store');
    Route::delete('/file/{id}', 'LinkFileController@destroy');
    Route::put('/file/{id}', 'LinkFileController@update');
});

Route::get('/file', 'LinkFileController@index');
Route::get('/file/landing', 'LinkFileController@landing');
Route::get('/images-show/slider/', 'UploadImagesController@showSlide');
Route::get('/importantpost/{kategori}', 'ImportantPostController@Index');
Route::get('/landingPagePost/{kategori}', 'ImportantPostController@landingPage');
Route::get('/importantpost/detail/{kategori}', 'ImportantPostController@showAll');
Route::get('/posts/detail/{id}', 'PostController@show');
Route::get('/blog/{slug}', 'ImportantPostController@blog');
Route::get('/images-detail/{id}', 'UploadImagesController@show');



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
