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
Route::post('customerEmailPost', 'MainNavController@customerEmailPost');

//routy pre pracu s autentifikaciou, napr. odhlasenie
Auth::routes();

//routy pre pracu s inzeratmi. Patri sem: zobrazenie vsetkych inzeratov, zobrazenie detailu, vytvorenie, update,
// odstranenie a zmazanie inzeratu, takze nevytvarat ziadne duplikaty!
Route::resource('inzeraty', 'InzeratyController');

//homecontroller je pre login a registrovanie(nic sem nepchajte zatial :D)
Route::get('/home', 'HomeController@index')->name('home');

// stranky pre administracne rozhranie
//tu budú všetky routy, ktore maju byť dostupné len ak je používateľ prihlásený
Route::middleware(['auth'])->group(function () {
    //routy pre admina
    Route::group(['middleware' => '\App\Http\Middleware\Admin'], function () {

        Route::resource('inzeraty_a', 'AdminInzeratyController');
        Route::resource('pouzivatelia_a', 'AdminPouzivateliaController');
        Route::resource('realitky_a', 'AdminRealitkyController');

        Route::delete('blokPouzivatel/{id}','AdminPouzivateliaController@blokovat');
        Route::get('zmenaHesla','AdminPouzivateliaController@zmenaHesla');
        Route::post('overitHeslo','AdminPouzivateliaController@OveritHeslo');

    });
    //routy pre majitela realitky
    Route::group(['middleware' => 'App\Http\Middleware\Realitka'], function () {
        Route::resource('inzeraty_r', 'RealitkaInzeratyController');
        Route::get('indexBezMajitela','RealitkaInzeratyController@indexBezMajitela');
        Route::get('grafy','RealitkaInzeratyController@grafy');


        Route::resource('makleri_r', 'RealitkaMakleriController');
        // definuj route a akciu
        Route::get('indexPouzivatel/{id}','RealitkaMakleriController@indexPouzivatel');
        Route::get('editMakler/{id}','RealitkaMakleriController@editMakler');           // metoda pre zobrazenie editu inzeratu pri mazani maklera resp. prideleni inzeratu niekomu inemu
        Route::get('removeMakler/{id}','RealitkaMakleriController@removeMakler');       // suvisi s tm istym
        Route::post('updateMakler/{id}','RealitkaMakleriController@updateMakler');      // suvisi s tm istym
        Route::post('updateProfil/{id}','RealitkaMakleriController@updateProfil');      // updatnutie udajov
        Route::get('editProfil/{id}','RealitkaMakleriController@editProfil');           // editovanie osobnych udajov majitela realitky
        Route::post('updateFirma/{id}','RealitkaMakleriController@updateFirma');        // updatnutie udajov
        Route::get('editFirma/{id}','RealitkaMakleriController@editFirma');             // editovanie udajov o realitke
    });

    //routy pre maklera
    Route::group(['middleware' => 'App\Http\Middleware\Makler'], function () {
        Route::resource('makler', 'MaklerController');

    });




    //routy pre prihlaseneho pouzivatela. Majitel realitky, makler ale aj admin moze mat inzeraty...
    //takze ak je ktokolvek prihlaseny, tak po kliknuti na tlacidlo Moje Inzeraty sa mu zobrazia len jeho inzeraty
    Route::resource('moje_inzeraty_p', 'PrihlasenyInzeratyController');
    Route::get('zmena_Hesla','PrihlasenyInzeratyController@zmenaHesla');
    Route::post('ulozit_Heslo','PrihlasenyInzeratyController@ulozitHeslo');

});