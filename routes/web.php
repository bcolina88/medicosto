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

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/resetPassword', 'HomeController@cambiarPassword')->name('resetPassword');
Route::post('/resetPassword', 'HomeController@resetPass')->name('resetPass');


Route::get('descargar/{id}', 'PagoController@pdf')->name('reciboPago');

//Route::get('/obras/crearPago', 'ObraController@createPago')->name('obras.createPago');
//Route::get('/obras/listadoPagos', 'ObraController@listadoPagos')->name('obras.listadoPagos');
//Route::post('/obras/storePago', 'ObraController@storePago')->name('obras.storePago');



Route::get('usuarios/activate/{id}', 'UsersController@activate')->name('usuarios.activate');
Route::get('usuarios/deactivate/{id}', 'UsersController@deactivate')->name('usuarios.deactivate');
Route::get('obras/activate/{id}', 'ObraController@activate')->name('obras.activate');
Route::get('obras/deactivate/{id}', 'ObraController@deactivate')->name('obras.deactivate');
Route::get('profesionales/activate/{id}', 'ProfesionalesController@activate')->name('profesionales.activate');
Route::get('profesionales/deactivate/{id}', 'ProfesionalesController@deactivate')->name('profesionales.deactivate');



Route::resource('/usuarios','UsersController');
Route::resource('/roles','RolesController');
Route::resource('/obras','ObraController');
Route::resource('/profesionales','ProfesionalesController');
Route::resource('/liquidaciones','LiquidacionController');
Route::resource('/pagos','PagoController');



//Rutas de la API.
Route::prefix('api')->group(function () {
	//Route::resource('/rutas','ApiController@index')->name('rutas');
	
    Route::get('permissions', 'ApiController@permissions')->name('permissions');
    Route::get('getRoleInfo', 'ApiController@getRoleInfo')->name('getRoleInfo');
    Route::get('getCarga', 'ApiController@getCarga')->name('getCarga');
    Route::get('getDescuento', 'ApiController@getDescuento')->name('getDescuento');
    Route::get('getObra', 'ApiController@getObra')->name('getObra');
    Route::get('getPagosItems', 'ApiController@getPagosItems')->name('getPagosItems');



    
	
});

// //Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

// //Clear Cache facade value:
Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return '<h1>Cache facade value cleared</h1>';
});

// //View Clear facade value:
Route::get('/view-clear', function() {
     $exitCode = Artisan::call('view:clear');
     return '<h1>View facade value cleared</h1>';
});

// //View cache facade value:
Route::get('/view-cache', function() {
     $exitCode = Artisan::call('view:cache');
     return '<h1>View facade value cache</h1>';
});
