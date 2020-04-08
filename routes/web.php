<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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

/*Route::get('/', function () { // ruteo con closure, esta funcion no lo guarda en caché (no recomendado)
    return view('welcome'); 
});*/

//Route::view('/', 'welcome');

Route::get('permiso/{nombre?}/{edad?}', 'PermisoController@index')->where(['nombre'=>'[A-Za-z]+', 'edad' => '[0-9]+'])->name('permiso'); // ruteo desde controlador

Route::get('admin/sistema/permiso', 'PermisoController@index')->name('permiso'); 
/* Lo referencio como {{route('permiso')}} en la view
Evito recordar la url que es admin/sistema/permiso {{url(''admin/sistema/permiso)}}*/

Route::get('/', 'InicioController@index');
