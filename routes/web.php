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

Route::get('/', 'InzeratyController@index');

Auth::routes();

Route::resource('inzeraty', 'InzeratyController');

Route::get('moje_inzeraty',function (){
  return view('inzeraty/moje_inzeraty');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('inzeraty/detail/{id}' , 'InzeratyController@show');


// stranky pre administracne rozhranie

Route::get('/admin', function () {
    return view('admin/index');
});

Route::get('/admin/statistiky', function () {
    return view('admin/statistiky');
});

Route::get('/admin/edit_inzeratov', function () {
    return view('admin/edit_inzeratov');
});

Route::get('/admin/edit_pouzivatelov', function () {
    return view('admin/edit_pouzivatelov');
});