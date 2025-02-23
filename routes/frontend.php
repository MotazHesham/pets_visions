<?php

use App\Http\Controllers\Frontend\AdoptionRequestsController;
use App\Http\Controllers\Frontend\AdoptionPetsController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\ClinicReviewsController;
use App\Http\Controllers\Frontend\ClinicsController;
use App\Http\Controllers\Frontend\ClinicServicesController;
use App\Http\Controllers\Frontend\DashboardController;
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
use App\Http\Controllers\Frontend\ProductWishlistController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\StrayPetsController;
use App\Http\Controllers\Frontend\SubscriptionsController;
use App\Http\Controllers\Frontend\UserPetsController;
use App\Http\Controllers\Frontend\VolunteersController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'frontend.'], function () {

    // Login
    Route::get('frontend/login', [AuthController::class,'login'])->name('login');

    // Register
    Route::get('frontend/register/{type}', [AuthController::class,'register_form'])->name('register');
    Route::post('frontend/register', [AuthController::class,'register'])->name('register.store');

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

    // Hostings
    Route::get('hostings', [HostingsController::class,'hostings'])->name('hostings');
    Route::get('hostings/{id}', [HostingsController::class,'show'])->name('hostings.show');

    // HostingReviews
    Route::get('hosting-reviews/{id}', [HostingReviewsController::class,'index'])->name('hosting-reviews');
    Route::post('hosting-reviews/store',[HostingReviewsController::class, 'store'])->name('hosting-reviews.store');

    // Adoptions
    Route::get('adoptions', [AdoptionPetsController::class,'adoptions'])->name('adoptions');

    // AdoptionsRequests
    Route::get('adoption-requests/create/{id}', [AdoptionRequestsController::class,'create'])->name('adoption-requests.create');
    Route::post('adoption-requests/store', [AdoptionRequestsController::class,'store'])->name('adoption-requests.store');

    // PetCompanion
    Route::get('pet-companions', [PetCompanionsController::class,'pet_companions'])->name('pet-companions');  
    Route::get('pet-companions/{id}', [PetCompanionsController::class,'show'])->name('pet-companions.show');

    // HostingReviews
    Route::get('pet-companion-reviews/{id}', [PetCompanionReviewsController::class,'index'])->name('pet-companion-reviews');
    Route::post('pet-companion-reviews/store',[PetCompanionReviewsController::class, 'store'])->name('pet-companion-reviews.store');

    // StrayPets
    Route::get('stray-pets', [StrayPetsController::class,'stray_pets'])->name('stray-pets');
    Route::get('stray-pets/create/{type}', [StrayPetsController::class,'create'])->name('stray-pets.create');
    Route::post('stray-pets/store', [StrayPetsController::class,'store'])->name('stray-pets.store');

    // DeliveryPets
    Route::get('delivery-pets', [DeliveryPetsController::class,'delivery_pets'])->name('delivery-pets');
    Route::post('delivery-pets/store', [DeliveryPetsController::class,'store'])->name('delivery-pets.store');

    // News
    Route::get('news', [NewsController::class,'news'])->name('news'); 
    Route::get('news/{id}', [NewsController::class,'show'])->name('news.show'); 
    
    // NewsComment
    Route::post('news-comment/store', [NewsCommentsController::class,'store'])->name('news-comments.store');

    // Volunteer
    Route::get('volunteers', [VolunteersController::class,'volunteers'])->name('volunteers');
    Route::post('volunteers/store', [VolunteersController::class,'store'])->name('volunteers.store');

    Route::group(['middleware' => 'auth','as' => 'dashboard.'], function () {
        // Dashboard
        Route::get('dashboard', [DashboardController::class,'dashboard'])->name('home');
        Route::get('dashboard/info', [DashboardController::class,'info'])->name('info');  
        Route::get('dashboard/profile/edit', [DashboardController::class,'profile_edit'])->name('profile-edit'); 
        Route::post('dashboard/profile/update', [DashboardController::class,'profile_update'])->name('profile-update');  
        
        // Wishlists
        Route::get('dashboard/wishlists', [ProductWishlistController::class,'wishlists'])->name('wishlists'); 
        Route::get('dashboard/wishlists/update_or_create/{id}', [ProductWishlistController::class,'update_or_create'])->name('wishlists.update_or_create');  

        // UserPets
        Route::get('dashboard/my-pets', [UserPetsController::class,'my_pets'])->name('my-pets');
        Route::get('dashboard/my-pets/{id}', [UserPetsController::class,'show'])->name('my-pets.show');
        Route::get('dashboard/my-pets/destroy/{id}', [UserPetsController::class,'destroy'])->name('my-pets.destroy');
        Route::post('dashboard/my-pets/store', [UserPetsController::class,'store'])->name('my-pets.store');
        Route::post('dashboard/my-pets/update', [UserPetsController::class,'update'])->name('my-pets.update');
    });

    // Subscriptions
    Route::post('subscriptions/store', [SubscriptionsController::class,'store'])->name('subscriptions.store');
    
});