<?php

use App\Admin\Rol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;
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

//Route::group(array('https'), function () {
    Route::get('/', 'InicioController@index')->name('inicio');
    Route::get('seguridad/login','Seguridad\LoginController@index')->name('login');
    Route::post('seguridad/login','Seguridad\LoginController@login')->name('login_post');
    Route::get('/laravel','InicioController@laravel');
    //Route::get('permiso', 'Admin\PermisoController@index')->name('permiso');

    Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => 'auth'], function () {
        Route::get('','AdminController@index');
        Route::get('permiso', 'PermisoController@index')->name('permiso');
        Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
        // RUTAS DEL MENÚ
        Route::get('menu', 'MenuController@index')->name('menu');
        Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
        Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
        Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
        // RUTAS DEL ROL
        Route::get('rol', 'RolController@index')->name('rol');
        Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
        Route::post('rol', 'RolController@guardar')->name('guardar_rol');
        Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
        Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
        Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol');
        // RUTAS DE MENU ROL
        Route::get('menu-rol','MenuRolController@index')->name('menu_rol');
        Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');
    });

//});
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
