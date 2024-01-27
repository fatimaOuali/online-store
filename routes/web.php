<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Frontend\FavoriteController;

Route::get('/', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/propos', 'App\Http\Controllers\HomeController@propos')->name("propos.index");
Route::get('/product', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/product/women', 'App\Http\Controllers\ProductController@women')->name("product.women");
Route::get('/product/man', 'App\Http\Controllers\ProductController@man')->name("product.man");
Route::get('/product/kids', 'App\Http\Controllers\ProductController@kids')->name("product.kids");
Route::get('/products/{id}','App\Http\Controllers\ProductController@show')->name("product.show");
// admin delete product-image

Route::get('/search', 'App\Http\Controllers\ProductController@search')->name("search.search");

// Route::post('/products', 'App\Http\Controllers\ProductController@filter')->name("product.filter");
Route::get('/products/category/{categoryId}', 'App\Http\Controllers\ProductController@showByCategory')->name('product.category');

Route::get('/products/Women/type/{typeId}', 'App\Http\Controllers\ProductController@showByTypeWomen')->name('product.typewomen');
Route::get('/products/men/type/{typeId}', 'App\Http\Controllers\ProductController@showByTypeMen')->name('product.typemen');
Route::get('/products/kids/type/{typeId}', 'App\Http\Controllers\ProductController@showByTypeKids')->name('product.typekids');

Route::get('/Home/products/category/{categoryId}', 'App\Http\Controllers\HomeController@showByCategory')->name('home.category');

Route::get('/contact', 'App\Http\Controllers\MessageController@index')->name("message.index");
Route::post('/contact/store', 'App\Http\Controllers\MessageController@store')->name("message.store");

// Route::get('/commande', 'App\Http\Controllers\CommandeController@index')->name("commande.index");
// Route::post('/commande/store', 'App\Http\Controllers\CommandeController@store')->name("commande.store");



       
 // /add-to-wishlist
 Route::get('/addwishlist', 'App\Http\Controllers\Frontend\FavoriteController@add')->name("wishlist.add");
 // /delete_wishlist
 Route::get('/delete_wishlist', 'App\Http\Controllers\Frontend\FavoriteController@delete_wishlist')->name("wishlist.delete_wishlist");

   //  delete_cart
   Route::post('/cart/delete-item', 'App\Http\Controllers\CartController@deleteCartItem')->name("cart.deleteCartItem");
   Route::get('/cart/remove/{product_id}','App\Http\Controllers\CartController@deleteCartItem')->name('cart.deleteCartItem');
  
Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
    Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
    Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
    Route::get('/order/{id}/delete', 'App\Http\Controllers\MyAccountController@delete')->name('myaccount.orders.delete');

     // wicshlist
     Route::get('/wishlist', 'App\Http\Controllers\Frontend\FavoriteController@index')->name("wishlist.index");
  



   Route::get('/profile', 'App\Http\Controllers\Frontend\UserController@index')->name("profile.index");
 
   Route::post('/modifierprofile', 'App\Http\Controllers\Frontend\UserController@updateProfile')->name("profile.updateProfile");
   Route::get('/monprofile', 'App\Http\Controllers\Frontend\UserController@show')->name("profile.show");

});

    
Route::middleware('admin')->group(function () {
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");

Route::get('/admin/product-image/{image_id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete_image')->name("admin.product.delete_image");
// admin/orders/'.$order->id.'/destroy
Route::get('/admin/orders/{id}/destroy', 'App\Http\Controllers\Admin\AdminOrdresController@destroy')->name("admin.orders.destroy");
Route::get('/admin/orders', 'App\Http\Controllers\Admin\AdminOrdresController@orders')->name("admin.orders.orders");
// Route::delete('/admin/orders/{id}/delete', 'App\Http\Controllers\Admin\AdminOrdresController@delete')->name("admin.orders.delete");


Route::get('/admin/clients', 'App\Http\Controllers\Admin\UserController@index')->name("admin.clients.index");
Route::delete('/admin/clients/{id}/delete', 'App\Http\Controllers\Admin\UserController@delete')->name("admin.clients.delete");

Route::get('/admin/message', 'App\Http\Controllers\Admin\AdminMessageController@index')->name("admin.message.index");
Route::delete('/admin/message/{id}/delete', 'App\Http\Controllers\Admin\AdminMessageController@delete')->name("admin.message.delete");



// Route::get('/admin/commande', 'App\Http\Controllers\Admin\AdminCommandeController@index')->name("admin.commande.index");
// Route::delete('/admin/commande/{id}/delete', 'App\Http\Controllers\Admin\AdminCommandeController@delete')->name("admin.commande.delete");

Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name("admin.category.index");
Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name("admin.category.store");
Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name("admin.category.delete");
Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name("admin.category.edit");
Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name("admin.category.update");


Route::get('/admin/types', 'App\Http\Controllers\Admin\AdminTypeController@index')->name("admin.type.index");
Route::post('/admin/types/store', 'App\Http\Controllers\Admin\AdminTypeController@store')->name("admin.type.store");
Route::delete('/admin/types/{id}/delete', 'App\Http\Controllers\Admin\AdminTypeController@delete')->name("admin.type.delete");
Route::get('/admin/types/{id}/edit', 'App\Http\Controllers\Admin\AdminTypeController@edit')->name("admin.type.edit");
Route::put('/admin/types/{id}/update', 'App\Http\Controllers\Admin\AdminTypeController@update')->name("admin.type.update");

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
