<?php

use Illuminate\Support\Facades\Route; 

Route::group(['prefix' => 'hosting', 'as' => 'hosting.', 'namespace' => 'Hosting', 'middleware' => ['auth', 'hosting']], function () {

    Route::get('/', 'HomeController@index')->name('home'); 

    // Hosting Reviews
    Route::delete('hosting-reviews/destroy', 'HostingReviewsController@massDestroy')->name('hosting-reviews.massDestroy');
    Route::resource('hosting-reviews', 'HostingReviewsController');

    Route::post('hostings/media', 'ProfileController@storeMedia')->name('hostings.storeMedia');
    Route::post('hostings/ckmedia', 'ProfileController@storeCKEditorImages')->name('hostings.storeCKEditorImages');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        
        Route::get('', 'ProfileController@edit')->name('edit'); 
        Route::post('profile', 'ProfileController@updateProfile')->name('updateProfile');
            
    });
});
