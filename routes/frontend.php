<?php

use App\Http\Controllers\Frontend\AdoptionRequestsController;
use App\Http\Controllers\Frontend\AdoptionPetsController;
use App\Http\Controllers\Frontend\ClinicReviewsController;
use App\Http\Controllers\Frontend\ClinicsController;
use App\Http\Controllers\Frontend\ClinicServicesController;
use App\Http\Controllers\Frontend\DeliveryPetsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\HostingReviewsController;
use App\Http\Controllers\Frontend\HostingsController;
use App\Http\Controllers\Frontend\NewsCommentsController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\PetCompanionReviewsController;
use App\Http\Controllers\Frontend\PetCompanionsController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ProductReviewsController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\StrayPetsController;
use App\Http\Controllers\Frontend\SubscriptionsController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'frontend.'], function () {

    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('about', [HomeController::class,'about'])->name('about'); 
    Route::get('firstaids', [HomeController::class,'firstaids'])->name('firstaids');

    // Shops
    Route::get('shops', [ShopController::class,'shops'])->name('shops');
    Route::get('shops/{id}', [ShopController::class,'show'])->name('shops.show'); 

    // Products
    Route::get('products/search', [ProductController::class,'search'])->name('products.search'); 
    Route::get('products/{slug}/{name?}', [ProductController::class,'show'])->name('products.show'); 

    // ProductReview
    Route::post('product-reviews/store',[ProductReviewsController::class, 'store'])->name('product-reviews.store');

    // Clinics
    Route::get('clinics', [ClinicsController::class,'clinics'])->name('clinics');
    Route::get('clinics/{id}', [ClinicsController::class,'show'])->name('clinics.show');

    // ClinicServices 
    Route::get('clinic.services/{id}', [ClinicServicesController::class,'show'])->name('clinic-services.show');

    // ClinicReviews
    Route::get('clinic-reviews/{id}', [ClinicReviewsController::class,'index'])->name('clinic-reviews');
    Route::post('clinic-reviews/store',[ClinicReviewsController::class, 'store'])->name('clinic-reviews.store');

    // hostings
    Route::get('hostings', [HostingsController::class,'hostings'])->name('hostings');
    Route::get('hostings/{id}', [HostingsController::class,'show'])->name('hostings.show');

    // hostingReviews
    Route::get('hosting-reviews/{id}', [HostingReviewsController::class,'index'])->name('hosting-reviews');
    Route::post('hosting-reviews/store',[HostingReviewsController::class, 'store'])->name('hosting-reviews.store');

    // adoptions
    Route::get('adoptions', [AdoptionPetsController::class,'adoptions'])->name('adoptions');

    // adoptionsRequests
    Route::get('adoption-requests/create/{id}', [AdoptionRequestsController::class,'create'])->name('adoption-requests.create');
    Route::post('adoption-requests/store', [AdoptionRequestsController::class,'store'])->name('adoption-requests.store');

    // petCompanion
    Route::get('pet-companions', [PetCompanionsController::class,'pet_companions'])->name('pet-companions');  
    Route::get('pet-companions/{id}', [PetCompanionsController::class,'show'])->name('pet-companions.show');

    // hostingReviews
    Route::get('pet-companion-reviews/{id}', [PetCompanionReviewsController::class,'index'])->name('pet-companion-reviews');
    Route::post('pet-companion-reviews/store',[PetCompanionReviewsController::class, 'store'])->name('pet-companion-reviews.store');

    // strayPets
    Route::get('stray-pets', [StrayPetsController::class,'stray_pets'])->name('stray-pets');
    Route::get('stray-pets/create/{type}', [StrayPetsController::class,'create'])->name('stray-pets.create');
    Route::post('stray-pets/store', [StrayPetsController::class,'store'])->name('stray-pets.store');

    // deliveryPets
    Route::get('delivery-pets', [DeliveryPetsController::class,'delivery_pets'])->name('delivery-pets');
    Route::post('delivery-pets/store', [DeliveryPetsController::class,'store'])->name('delivery-pets.store');

    // news
    Route::get('news', [NewsController::class,'news'])->name('news'); 
    Route::get('news/{id}', [NewsController::class,'show'])->name('news.show'); 
    
    // newsComment
    Route::post('news-comment/store', [NewsCommentsController::class,'store'])->name('news-comments.store');

    // Subscriptions
    Route::post('subscriptions/store', [SubscriptionsController::class,'store'])->name('subscriptions.store');

    Route::get('volunteer', [HomeController::class,'volunteer'])->name('volunteer');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});