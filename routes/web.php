<?php


//prve co sa zobrazi po prichode na stranku
Route::get('/', 'InzeratyController@index');

//tu su routy pre hlavny nav bar( zobrazenie kontaktu, realitnych kancelari a zobrazenie formu pre zadanie telefonneho
// cisla, pomocou ktoreho si neregistrovany pouzivatel bude zobrazovat svoje inzeraty )
Route::get('kontakt', 'MainNavController@getKontakt');
Route::get('realitne_kancelarie', 'MainNavController@getRealitky');
Route::get('moje_inzeraty', 'MainNavController@getMojeInzeraty');
Route::get('overit_email','MainNavController@overitEmail');
Route::post('overit_email','MainNavController@overitEmailpost');


//routy pre pracu s autentifikaciou, napr. odhlasenie
Auth::routes();

//routy pre pracu s inzeratmi. Patri sem: zobrazenie vsetkych inzeratov, zobrazenie detailu, vytvorenie, update,
// odstranenie a zmazanie inzeratu, takze nevytvarat ziadne duplikaty!
Route::resource('inzeraty', 'InzeratyController');

//homecontroller je pre login a registrovanie(nic sem nepchajte zatial :D)
Route::get('/home', 'HomeController@index')->name('home');


Route::post('customerEmailPost', 'MainNavController@customerEmailPost');

// stranky pre administracne rozhranie
//tu budú všetky routy, ktore maju byť dostupné len ak je používateľ prihlásený
Route::middleware(['auth'])->group(function () {
    //routy pre admina
    Route::group(['middleware' => '\App\Http\Middleware\Admin'], function () {

        Route::resource('inzeraty_a', 'AdminInzeratyController');
        Route::resource('pouzivatelia_a', 'AdminPouzivateliaController');
        Route::resource('realitky_a', 'AdminRealitkyController');

    });
    //routy pre majitela realitky
    Route::group(['middleware' => 'App\Http\Middleware\Realitka'], function () {
        Route::resource('inzeraty_r', 'RealitkaInzeratyController');
        Route::resource('makleri_r', 'RealitkaMakleriController');
    });

    //routy pre prihlaseneho pouzivatela. Majitel realitky, makler ale aj admin moze mat inzeraty...
    //takze ak je ktokolvek prihlaseny, tak po kliknuti na tlacidlo Moje Inzeraty sa mu zobrazia len jeho inzeraty
    Route::resource('moje_inzeraty_p', 'PrihlasenyInzeratyController');
});