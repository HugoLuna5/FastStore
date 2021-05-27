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
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('', 'Admin\HomeController@index')->name('homeAdmin');
        Route::resource('categorias', 'Admin\CategoriasController');
        Route::resource('productos', 'Admin\ProductosController');
        Route::resource('pedidos', 'Admin\PedidosController');
        Route::resource('usuarios', 'Admin\UsuariosController');
        Route::get('usuarios/reset-password/{id}', 'Admin\UsuariosController@resetPassword')->name('resetPassword');
    });
});


Route::bind('producto', function ($idProducto) {
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

Route::get('/shopping-cart', [
    'as' => 'carrito',
    'uses' => 'CarController@show'

]);

Route::get('/shopping-cart/order/details', [
    'as' => 'orderDetails',
    'uses' => 'CarController@detailsOrder'
])->middleware('auth');

Route::get('/shopping-cart/add/{producto}', [
    'as' => 'addCar',
    'uses' => 'CarController@add'

]);

Route::get('/shopping-cart/update/{producto}/{cantidad?}', [
    'as' => 'updateCar',
    'uses' => 'CarController@update'
]);

Route::get('/shopping-cart/delete/{producto}', [
    'as' => 'deleteCar',
    'uses' => 'CarController@delete'
]);

Route::get('/shopping-cart/payment', [
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment'
]);

Route::get('/shopping-cart/payment/status', [
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus'
]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
