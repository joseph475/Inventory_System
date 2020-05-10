<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('Inventory','ApiController\InventoryController@index');
Route::delete('Inventory/{id}','ApiController\InventoryController@destroy');
Route::get('Inventory/{id}','ApiController\InventoryController@show');
Route::POST('Add Inventory','ApiController\InventoryController@store');
Route::PUT('Inventory','ApiController\InventoryController@store');

// Route::get('Sales','ApiController\SalesController@index');
// Route::delete('Sales/{id}','ApiController\SalesController@destroy');
Route::get('Sales/{id}','ApiController\SalesController@show');
Route::POST('Sales','ApiController\SalesController@store');
// Route::PUT('Sales','ApiController\SalesController@store');

Route::get('Brands','ApiController\BrandsController@index');
Route::get('Brands/BrandsAsc','ApiController\BrandsController@ascOrder');
Route::post('Brands','ApiController\BrandsController@store');
Route::delete('Brands/{id}','ApiController\BrandsController@destroy');

Route::get('Categories','ApiController\CategoriesController@index');
Route::get('Categories/CategoriesAsc','ApiController\CategoriesController@ascOrder');
Route::post('Categories','ApiController\CategoriesController@store');
Route::delete('Categories/{id}','ApiController\CategoriesController@destroy');

Route::get('Colors','ApiController\ColorsController@index');
Route::get('Colors/ColorsAsc','ApiController\ColorsController@ascOrder');
Route::post('Colors','ApiController\ColorsController@store');
Route::delete('Colors/{id}','ApiController\ColorsController@destroy');

Route::get('Models','ApiController\ModelsController@index');
Route::get('Models/ModelsAsc','ApiController\ModelsController@ascOrder');
Route::post('Models','ApiController\ModelsController@store');
Route::delete('Models/{id}','ApiController\ModelsController@destroy');

Route::get('Suppliers','ApiController\SuppliersController@index');
Route::get('Suppliers/SuppliersAsc','ApiController\SuppliersController@ascOrder');
Route::post('Suppliers','ApiController\SuppliersController@store');
Route::delete('Suppliers/{id}','ApiController\SuppliersController@destroy');

Route::get('Freebies','ApiController\FreebiesController@index');
Route::get('Freebies/FreebiesAsc','ApiController\FreebiesController@ascOrder');
Route::post('Freebies','ApiController\FreebiesController@store');
Route::delete('Freebies/{id}','ApiController\FreebiesController@destroy');