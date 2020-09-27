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

Route::get('/', function () {
    return view('welcome');
});

//  Modulo Seguridad Usuario
//Empresa
Route::get('empresa/index', 'UsuarioSeguridad\\CEmpresa@index')->name('empresa/index');
Route::post('empresa/editar', 'UsuarioSeguridad\\CEmpresa@editar')->name('empresa/editar');

//Vendedor
Route::get('vendedor/index', 'UsuarioSeguridad\\CVendedor@index')->name('vendedor/index');
Route::post('vendedor/registrar', 'UsuarioSeguridad\\CVendedor@registrar')->name('vendedor/registrar');
Route::post('vendedor/editar', 'UsuarioSeguridad\\CVendedor@editar')->name('vendedor/editar');
Route::post('vendedor/eliminar', 'UsuarioSeguridad\\CVendedor@darBaja')->name('vendedor/eliminar');



Route::get('home',function(){
    return view('admin.home.home');
});
Route::get('vendedor',function(){
    return view('admin.usuarioSeguridad.vendedor.index');
});
Route::get('empresa',function(){
    return view('admin.usuarioSeguridad.empresa.index');
});

