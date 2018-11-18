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

use App\Http\Middleware\Admin;

Route::get('/', 'InzeratyController@index');

Auth::routes();

Route::resource('inzeraty', 'InzeratyController');

Route::get('moje_inzeraty', function () {
    return view('inzeraty/moje_inzeraty_dotaz');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('inzeraty/detail/{id}', 'InzeratyController@show');


// stranky pre administracne rozhranie
//tu budú všetky routy, ktore maju byť dostupné len ak je používateľ prihlásený

Route::middleware(['auth'])->group(function () {
    //routy pre admina
    Route::group(['middleware' => '\App\Http\Middleware\Admin'], function () {
        /*Route::get('/admin', function () {
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
        });*/
        Route::resource('inzeraty_a', 'AdminInzeratyController');
        Route::resource('pouzivatelia_a', 'AdminPouzivateliaController');
        Route::resource('realitky_a', 'AdminRealitkyController');

    });
    //routy pre majitela realitky
    Route::group(['middleware' => 'App\Http\Middleware\Realitka'], function () {
        Route::resource('inzeraty_r', 'RealitkaInzeratyController');
        Route::resource('makleri_r', 'RealitkaMakleriController');
    });

    Route::get('moje_r_inzeraty', 'InzeratyController@mojeInzeraty');
});