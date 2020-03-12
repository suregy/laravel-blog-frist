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

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/about', function () {
//     $nama = 'Dadas Resol!';
//     return view('about', ['nama' => $nama]);
// });

Route::get('/', 'BlogController@index');
Route::get('/about', 'PagesController@about');

// Route::get('/mahasiswa', 'MahasiswaController@index');

Route::get('/students', 'StudentsController@index');
Route::get('/students/create', 'StudentsController@create');
Route::get('/students/{student}', 'StudentsController@show');
Route::post('/students', 'StudentsController@store');
Route::delete('/students/{student}', 'StudentsController@destroy');

// Route::get('/blog', 'BlogController@index');
// Route::get('/blog/create', 'BlogController@create');
// Route::post('/blog', 'BlogController@store');
// Route::get('/blog/read/{slug}', 'BlogController@show');

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

// Route::get('/kategori', 'KategoriController@index');
// Route::get('/kategori/create', 'KategoriController@create');
// Route::post('/kategori', 'KategoriController@store');
// Route::delete('/kategori/{kategori}', 'KategoriController@destroy');
// Route::get('/kategori/{kategori}/edit', 'KategoriController@edit');
// Route::put('/kategori/{kategori}', 'KategoriController@update');

Route::resource('blog', 'BlogController'); //apabila semua route mau dijalankan tinggal gunakan resource
Route::resource('kategori', 'KategoriController'); //apabila semua route mau dijalankan tinggal gunakan resource
Route::resource('tag', 'TagsController');