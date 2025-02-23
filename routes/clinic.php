<?php

use Illuminate\Support\Facades\Route; 

Route::group(['prefix' => 'clinic', 'as' => 'clinic.', 'namespace' => 'Clinic', 'middleware' => ['auth', 'clinic']], function () {

    Route::get('/', 'HomeController@index')->name('home'); 

    // Clinic Services
    Route::delete('clinic-services/destroy', 'ClinicServicesController@massDestroy')->name('clinic-services.massDestroy');
    Route::post('clinic-services/media', 'ClinicServicesController@storeMedia')->name('clinic-services.storeMedia');
    Route::post('clinic-services/ckmedia', 'ClinicServicesController@storeCKEditorImages')->name('clinic-services.storeCKEditorImages');
    Route::resource('clinic-services', 'ClinicServicesController');

    // Clinic Reviews
    Route::delete('clinic-reviews/destroy', 'ClinicReviewsController@massDestroy')->name('clinic-reviews.massDestroy');
    Route::resource('clinic-reviews', 'ClinicReviewsController');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        
        Route::get('', 'ProfileController@edit')->name('edit'); 
        Route::post('profile', 'ProfileController@updateProfile')->name('updateProfile');
            
    });
});
