<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'staff']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/update_statuses', 'UsersController@update_statuses')->name('users.update_statuses');
    Route::resource('users', 'UsersController');
    
    // Pets Lovers
    Route::resource('pets-lovers', 'PetsLoversController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Stores
    Route::delete('stores/destroy', 'StoresController@massDestroy')->name('stores.massDestroy');
    Route::post('stores/media', 'StoresController@storeMedia')->name('stores.storeMedia');
    Route::post('stores/ckmedia', 'StoresController@storeCKEditorImages')->name('stores.storeCKEditorImages');
    Route::resource('stores', 'StoresController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/update_statuses', 'ProductController@update_statuses')->name('products.update_statuses');
    Route::resource('products', 'ProductController');

    // Product Reviews
    Route::delete('product-reviews/destroy', 'ProductReviewsController@massDestroy')->name('product-reviews.massDestroy');
    Route::resource('product-reviews', 'ProductReviewsController');

    // Product Wishlist
    Route::resource('product-wishlists', 'ProductWishlistController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Clinics
    Route::delete('clinics/destroy', 'ClinicsController@massDestroy')->name('clinics.massDestroy');
    Route::post('clinics/media', 'ClinicsController@storeMedia')->name('clinics.storeMedia');
    Route::post('clinics/ckmedia', 'ClinicsController@storeCKEditorImages')->name('clinics.storeCKEditorImages');
    Route::resource('clinics', 'ClinicsController');

    // Clinic Services
    Route::delete('clinic-services/destroy', 'ClinicServicesController@massDestroy')->name('clinic-services.massDestroy');
    Route::post('clinic-services/media', 'ClinicServicesController@storeMedia')->name('clinic-services.storeMedia');
    Route::post('clinic-services/ckmedia', 'ClinicServicesController@storeCKEditorImages')->name('clinic-services.storeCKEditorImages');
    Route::resource('clinic-services', 'ClinicServicesController');

    // Clinic Reviews
    Route::delete('clinic-reviews/destroy', 'ClinicReviewsController@massDestroy')->name('clinic-reviews.massDestroy');
    Route::resource('clinic-reviews', 'ClinicReviewsController');

    // Pet Types
    Route::delete('pet-types/destroy', 'PetTypesController@massDestroy')->name('pet-types.massDestroy');
    Route::resource('pet-types', 'PetTypesController');

    // Hosting Services
    Route::delete('hosting-services/destroy', 'HostingServicesController@massDestroy')->name('hosting-services.massDestroy');
    Route::resource('hosting-services', 'HostingServicesController');

    // Paramedics
    Route::delete('paramedics/destroy', 'ParamedicsController@massDestroy')->name('paramedics.massDestroy');
    Route::post('paramedics/update_statuses', 'ParamedicsController@update_statuses')->name('paramedics.update_statuses');
    Route::resource('paramedics', 'ParamedicsController');

    // Hostings
    Route::delete('hostings/destroy', 'HostingsController@massDestroy')->name('hostings.massDestroy');
    Route::post('hostings/media', 'HostingsController@storeMedia')->name('hostings.storeMedia');
    Route::post('hostings/ckmedia', 'HostingsController@storeCKEditorImages')->name('hostings.storeCKEditorImages');
    Route::resource('hostings', 'HostingsController');

    // Hosting Reviews
    Route::delete('hosting-reviews/destroy', 'HostingReviewsController@massDestroy')->name('hosting-reviews.massDestroy');
    Route::resource('hosting-reviews', 'HostingReviewsController');

    // Adoption Pets
    Route::delete('adoption-pets/destroy', 'AdoptionPetsController@massDestroy')->name('adoption-pets.massDestroy');
    Route::post('adoption-pets/media', 'AdoptionPetsController@storeMedia')->name('adoption-pets.storeMedia');
    Route::post('adoption-pets/ckmedia', 'AdoptionPetsController@storeCKEditorImages')->name('adoption-pets.storeCKEditorImages');
    Route::resource('adoption-pets', 'AdoptionPetsController');

    // Adoption Requests
    Route::delete('adoption-requests/destroy', 'AdoptionRequestsController@massDestroy')->name('adoption-requests.massDestroy');
    Route::resource('adoption-requests', 'AdoptionRequestsController');

    // Pet Companions
    Route::delete('pet-companions/destroy', 'PetCompanionsController@massDestroy')->name('pet-companions.massDestroy');
    Route::post('pet-companions/media', 'PetCompanionsController@storeMedia')->name('pet-companions.storeMedia');
    Route::post('pet-companions/ckmedia', 'PetCompanionsController@storeCKEditorImages')->name('pet-companions.storeCKEditorImages');
    Route::resource('pet-companions', 'PetCompanionsController');

    // Stray Pets
    Route::delete('stray-pets/destroy', 'StrayPetsController@massDestroy')->name('stray-pets.massDestroy');
    Route::post('stray-pets/media', 'StrayPetsController@storeMedia')->name('stray-pets.storeMedia');
    Route::post('stray-pets/ckmedia', 'StrayPetsController@storeCKEditorImages')->name('stray-pets.storeCKEditorImages');
    Route::resource('stray-pets', 'StrayPetsController');

    // Delivery Pets
    Route::delete('delivery-pets/destroy', 'DeliveryPetsController@massDestroy')->name('delivery-pets.massDestroy');
    Route::resource('delivery-pets', 'DeliveryPetsController');

    // Sliders
    Route::delete('sliders/destroy', 'SlidersController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SlidersController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/update_statuses', 'SlidersController@update_statuses')->name('sliders.update_statuses');
    Route::post('sliders/ckmedia', 'SlidersController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SlidersController');

    // Subscriptions
    Route::delete('subscriptions/destroy', 'SubscriptionsController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionsController');

    // Volunteers
    Route::delete('volunteers/destroy', 'VolunteersController@massDestroy')->name('volunteers.massDestroy');
    Route::resource('volunteers', 'VolunteersController');

    // News
    Route::delete('newss/destroy', 'NewsController@massDestroy')->name('newss.massDestroy');
    Route::post('newss/update_statuses', 'NewsController@update_statuses')->name('newss.update_statuses');
    Route::post('newss/media', 'NewsController@storeMedia')->name('newss.storeMedia');
    Route::post('newss/ckmedia', 'NewsController@storeCKEditorImages')->name('newss.storeCKEditorImages');
    Route::resource('newss', 'NewsController');

    // News Comments
    Route::delete('news-comments/destroy', 'NewsCommentsController@massDestroy')->name('news-comments.massDestroy');
    Route::resource('news-comments', 'NewsCommentsController', ['except' => ['create', 'store', 'edit', 'update', 'show']]);

    // Contact Us
    Route::delete('contact-uss/destroy', 'ContactUsController@massDestroy')->name('contact-uss.massDestroy');
    Route::resource('contact-uss', 'ContactUsController', ['except' => ['create', 'store', 'edit', 'update', 'show']]);

    // User Pets
    Route::delete('user-pets/destroy', 'UserPetsController@massDestroy')->name('user-pets.massDestroy');
    Route::post('user-pets/media', 'UserPetsController@storeMedia')->name('user-pets.storeMedia');
    Route::post('user-pets/ckmedia', 'UserPetsController@storeCKEditorImages')->name('user-pets.storeCKEditorImages');
    Route::resource('user-pets', 'UserPetsController'); 

    // Settings
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::post('settings/update', 'SettingsController@update')->name('settings.update');

    // Pet Companion Reviews
    Route::delete('pet-companion-reviews/destroy', 'PetCompanionReviewsController@massDestroy')->name('pet-companion-reviews.massDestroy');
    Route::resource('pet-companion-reviews', 'PetCompanionReviewsController');

    // Affiliation Analytics
    Route::delete('affiliation-analytics/destroy', 'AffiliationAnalyticsController@massDestroy')->name('affiliation-analytics.massDestroy');
    Route::resource('affiliation-analytics', 'AffiliationAnalyticsController', ['except' => ['create', 'store', 'edit', 'update']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
