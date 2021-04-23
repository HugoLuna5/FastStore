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


use App\Model\Producto;

Route::bind('producto', function ($idProducto){
    return \App\Model\Producto::find($idProducto);
});

Route::get('/', [
    'as' => 'inicio',
    'uses' => 'ProductosController@index'
]);

Route::get('producto/{idproducto}', [
    'as' => 'producto-detalle',
    'uses' => 'ProductosController@show'
]);

Route::get('/shopping-cart',[
    'as' => 'carrito',
    'uses' => 'CarController@show'

]);

Route::get('/shopping-cart/add/{producto}',[
    'as' => 'addCar',
    'uses' => 'CarController@add'

]);

Route::get('/shopping-cart/update/{producto}/{cantidad?}',[
    'as' => 'updateCar',
    'uses' => 'CarController@update'
]);

Route::get('/shopping-cart/delete/{producto}',[
    'as' => 'deleteCar',
    'uses' => 'CarController@delete'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
