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

use App\Product;
use Illuminate\Http\Request;

Route::get('/products', function () {
    $products = Product::orderBy('created_at', 'desc')->get();
    return view('products.index', compact('products'));
})->name('products.index');

Route::get('/products/create', function() {
    return view('products.create');
})->name('products.create');

Route::get('products/{id}/edit', function ($id) {
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
})->name('products.edit');


Route::post('products', function (Request $request) {
    $new_product = new Product;
    $new_product->price = $request->price;
    $new_product->description = $request->description;
    $new_product->save();

     return redirect()->route('products.index')->with('info', 'Product "' . $request->description . '" successfully created');
})->name('products.store');

Route::put('products/{id}', function (Request $request, $id) {
    $product = Product::findOrFail($id);
    $product->price = $request->price;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('products.index')->with('info', 'Product "' . $request->description . '" successfully updated');
})->name('products.update');

Route::delete('products/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('info', 'Product "' . $product->description . '" successfully deleted');
})->name('products.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    return view('welcome');
});
