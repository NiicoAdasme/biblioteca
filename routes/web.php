<?php

use App\Admin\Rol;
use App\Mail\PruebaCorreo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

// Ruta de prueba de envio de correo
/*Route::get('/sendmail', function () {
    $detalles= [
        'title' => 'Correo desde: Sistema de Biblioteca',
        'body' => 'Prueba de correo desde laravel'
    ];
    Mail::to('nicolas.wladimir@gmail.com')->send(new PruebaCorreo($detalles));
    echo "correo enviado correctamente";
});*/

//Route::group(array('https'), function () {
    Route::get('/', 'InicioController@index')->name('inicio');
    Route::get('/home','InicioController@index')->name('home')->middleware('verified');
    Route::get('/inicio','InicioController@index');

    //Route::get('seguridad/login','Seguridad\LoginController@index')->name('login');
    //Route::post('seguridad/login','Seguridad\LoginController@login')->name('login_post');
    Route::get('/laravel','InicioController@laravel');
    //Route::get('permiso', 'Admin\PermisoController@index')->name('permiso');
    //Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['auth','superadmin']], function () {
        // index administrador
        Route::get('','AdminController@index');
        // RUTAS DE PERMISO
        Route::get('permiso', 'PermisoController@index')->name('permiso');
        Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
        Route::post('permiso/crear','PermisoController@guardar')->name('guardar_permiso');
        Route::get('permiso/{id}/editar','PermisoController@editar')->name('editar_permiso');
        Route::put('permiso/{id}','PermisoController@actualizar')->name('actualizar_permiso');
        Route::delete('permiso/{id}','PermisoController@eliminar')->name('eliminar_permiso');
        // RUTAS PERMISO - ROL
        Route::get('permiso-rol','PermisoRolController@index')->name('permiso_rol');
        Route::post('permiso-rol','PermisoRolController@guardar')->name('guardar_permiso_rol');
        // RUTAS DEL MENÚ
        Route::get('menu', 'MenuController@index')->name('menu');
        Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
        Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
        Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
        Route::get('menu/{id}/editar','MenuController@editar')->name('editar_menu');
        Route::put('menu/{id}','MenuController@actualizar')->name('actualizar_menu');
        Route::delete('menu/{id}','MenuController@eliminar')->name('eliminar_menu');
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
// RUTAS DE AUTENTICACIÓN
Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Auth'], function () {
    Route::get('registro','RegisterController@showRegistrationForm')->name('register');
    Route::get('iniciar-sesion','LoginController@showLoginForm')->name('login');
    Route::post('registro','RegisterController@register');
    Route::post('iniciar-sesion','LoginController@login');
});
