<?php

Route::get('/','PagesController@home');
Route::prefix('shop')->group(function (){

  Route::get('/','ShopController@categories');
  Route::get('save-order','ShopController@saveOrder');
  Route::get('delete-item','ShopController@deleteItem');

  Route::get('update-cart','ShopController@updateCart');

  Route::get('cart-clear','ShopController@cartClear');
  Route::get('cart','ShopController@cart');
  Route::get('add-to-cart', 'ShopController@addToCart');
  Route::get('{curl}','ShopController@products');
  Route::get('{curl}/{purl}','ShopController@item');
  Route::get('search/autocomplete','SearchController@autoComplete');
  Route::get('search/autocompleteajax','SearchController@autoCompleteAjax');
  


});
// Users
Route::prefix('user')->group(function (){

  Route::get('signin', 'UserController@signin');
  Route::post('signin', 'UserController@postSignin');
  Route::get('signup', 'UserController@signup');
  Route::post('signup', 'UserController@postSignup');
  Route::get('logout', 'UserController@logout');
  


});
 # Cms
 Route::middleware(['cmsguard'])->group(function (){

  Route::prefix('cms')->group(function (){
    Route::get('dashboard','Cmscontroller@dashboard');
    Route::resource('menu','Menucontroller');
    Route::resource('content','ContentController');
    Route::resource('categories','CategoryController');
    Route::resource('products','ProductController');
    Route::resource('users','PermissionController');
    Route::put('users/{id}/edit', 'PermissionController@update');
    Route::get('orders/','CmsController@orders');
  
  });
  

 });
 

 
Route::get('{murl}','PagesController@content');

