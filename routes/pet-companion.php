<?php

use Illuminate\Support\Facades\Route; 

Route::group(['prefix' => 'pet-companion', 'as' => 'pet-companion.', 'namespace' => 'petCompanion', 'middleware' => ['auth', 'pet-companion']], function () {

    Route::get('/', 'HomeController@index')->name('home');  

    // Pet Companion Reviews
    Route::delete('pet-companion-reviews/destroy', 'PetCompanionReviewsController@massDestroy')->name('pet-companion-reviews.massDestroy');
    Route::resource('pet-companion-reviews', 'PetCompanionReviewsController');

    
    Route::post('storeMedia', 'ProfileController@storeMedia')->name('storeMedia');  
    Route::post('ckmedia', 'ProfileController@storeCKEditorImages')->name('storeCKEditorImages');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        
        Route::get('', 'ProfileController@edit')->name('edit'); 
        Route::post('profile', 'ProfileController@updateProfile')->name('updateProfile');
            
    });
});
