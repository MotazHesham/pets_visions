<?php

use Illuminate\Support\Facades\Route; 

Route::group(['prefix' => 'store', 'as' => 'store.', 'namespace' => 'store', 'middleware' => ['auth', 'store']], function () {

    Route::get('/', 'HomeController@index')->name('home'); 

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/update_statuses', 'ProductController@update_statuses')->name('products.update_statuses');
    Route::resource('products', 'ProductController');

    // Product Reviews
    Route::delete('product-reviews/destroy', 'ProductReviewsController@massDestroy')->name('product-reviews.massDestroy');
    Route::resource('product-reviews', 'ProductReviewsController');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        
        Route::get('', 'ProfileController@edit')->name('edit'); 
        Route::post('profile', 'ProfileController@updateProfile')->name('updateProfile');
            
    });
});
