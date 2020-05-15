<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/Inventory', function () {
    $data = array(
        "pageTitle"=> 'Inventory',
        "pageTitle1"=> 'Item'
    );
    return view('pages.Inventory.index', $data);
});
Route::get('/Inventory/AddItem', function () {
    $data = array(
        "pageTitle"=> 'Add Inventory',
        "pageTitle1"=> 'Item'
    );
    return view('pages.Inventory.addInventory', $data);
});

// Sales
Route::get('/Sales', function () {
    $data = array(
        "pageTitle"=> 'Sales',
        "pageTitle1"=> 'Sales'
    );
    return view('pages.Sales.index', $data);
});
Route::get('/SalesReport', function () {
    $data = array(
        "pageTitle"=> 'Sales Report',
        "pageTitle1"=> 'Sales Report'
    );
    return view('pages.Sales.salesReport', $data);
});



// Manage
Route::get('/ManageBrands', function () {
    $data = array(
        "pageTitle"=> 'Brands',
        "pageTitle1"=> 'Brand'
    );
    return view('pages.Manage.index', $data);
});
Route::get('/ManageCategories', function () {
    $data = array(
        "pageTitle"=> 'Categories',
        "pageTitle1"=> 'Category'
    );
    return view('pages.Manage.index', $data);
});
Route::get('/ManageColors', function () {
    $data = array(
        "pageTitle"=> 'Colors',
        "pageTitle1"=> 'Color'
    );
    return view('pages.Manage.index', $data);
});
Route::get('/ManageModels', function () {
    $data = array(
        "pageTitle"=> 'Models',
        "pageTitle1"=> 'Model'
    );
    return view('pages.Manage.index', $data);
});
Route::get('/ManageSuppliers', function () {
    $data = array(
        "pageTitle"=> 'Suppliers',
        "pageTitle1"=> 'Supplier'
    );
    return view('pages.Manage.index', $data);
});
Route::get('/ManageFreebies', function () {
    $data = array(
        "pageTitle"=> 'Freebies',
        "pageTitle1"=> 'Freebies'
    );
    return view('pages.Manage.index', $data);
});