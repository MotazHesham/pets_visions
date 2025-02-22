<?php

use App\Http\Controllers\Frontend\ClinicsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ProductReviewsController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\SubscriptionsController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('about', [HomeController::class,'about'])->name('about');

    Route::get('firstaids', [HomeController::class,'firstaids'])->name('firstaids');
    Route::get('hostings', [HomeController::class,'hostings'])->name('hostings');
    Route::get('adoptions', [HomeController::class,'adoptions'])->name('adoptions');
    Route::get('pet_companions', [HomeController::class,'pet_companions'])->name('pet_companions');
    Route::get('stray_pets', [HomeController::class,'stray_pets'])->name('stray_pets');
    Route::get('delivery_pets', [HomeController::class,'delivery_pets'])->name('delivery_pets');

    // Clinics
    Route::get('clinics', [ClinicsController::class,'clinics'])->name('clinics');
    Route::get('clinics/{id}', [ClinicsController::class,'show'])->name('clinics.show');

    // Shops
    Route::get('shops', [ShopController::class,'shops'])->name('shops');
    Route::get('shops/{id}', [ShopController::class,'show'])->name('shops.show'); 

    // Products
    Route::get('products/search', [ProductController::class,'search'])->name('products.search'); 
    Route::get('products/{slug}/{name?}', [ProductController::class,'show'])->name('products.show'); 

    // ProductReview
    Route::post('product-reviews/store',[ProductReviewsController::class, 'store'])->name('product-reviews.store');

    // Subscriptions
    Route::post('subscriptions/store', [SubscriptionsController::class,'store'])->name('subscriptions.store');

    Route::get('news', [HomeController::class,'news'])->name('news');

    Route::get('volunteer', [HomeController::class,'volunteer'])->name('volunteer');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});