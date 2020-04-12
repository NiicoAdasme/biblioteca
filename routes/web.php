<?php

use App\Admin\Rol;
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

/*Route::get('permiso/{nombre?}/{edad?}', 'PermisoController@index')->where(['nombre'=>'[A-Za-z]+', 'edad' => '[0-9]+'])->name('permiso'); // ruteo desde controlador

Route::get('admin/sistema/permiso/{nombre?}/{edad?}', 'PermisoController@index')->name('permiso'); */
/* Lo referencio como {{route('permiso')}} en la view
Evito recordar la url que es admin/sistema/permiso {{url(''admin/sistema/permiso)}}*/

Route::get('/', 'InicioController@index');
//Route::get('permiso', 'Admin\PermisoController@index')->name('permiso');

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
});
