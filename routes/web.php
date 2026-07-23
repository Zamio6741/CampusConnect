<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AccommodationPassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\MarketplaceFavoriteController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PastPaperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SavedAccommodationController;
use App\Http\Controllers\LostFoundController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\StudentServiceController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LandlordDashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RentalWizardController;
use App\Http\Controllers\Landlord\RentalController;
use App\Http\Controllers\Student\RentalBrowseController;
use App\Http\Controllers\BookingRequestController;
use App\Http\Controllers\BusinessDashboardController;
use App\Http\Controllers\BusinessGalleryController;
use App\Http\Controllers\BusinessPreviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentBusinessController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\BusinessMessageController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\BusinessReviewController;
use App\Http\Controllers\StudentMessageController;

Route::middleware(['auth', 'role:Landlord'])->group(function () {

    Route::get('/landlord/rental/create/step1',
        [RentalWizardController::class,'step1'])
        ->name('rental.step1');

    Route::post('/landlord/rental/create/step1',
        [RentalWizardController::class,'storeStep1'])
        ->name('rental.step1.store');


    Route::get('/landlord/rental/create/step2',
        [RentalWizardController::class,'step2'])
        ->name('rental.step2');

    Route::post('/landlord/rental/create/step2',
        [RentalWizardController::class,'storeStep2'])
        ->name('rental.step2.store');


    Route::get('/landlord/rental/create/step3',
        [RentalWizardController::class,'step3'])
        ->name('rental.step3');

    Route::post('/landlord/rental/create/step3',
        [RentalWizardController::class,'storeStep3'])
        ->name('rental.step3.store');


    Route::get('/landlord/rental/create/step4',
        [RentalWizardController::class,'step4'])
        ->name('rental.step4');

    Route::post('/landlord/rental/create/step4',
        [RentalWizardController::class,'storeStep4'])
        ->name('rental.step4.store');


    Route::get('/landlord/rental/create/step5',
        [RentalWizardController::class,'step5'])
        ->name('rental.step5');

    Route::post('/landlord/rental/publish',
        [RentalWizardController::class,'publish'])
        ->name('rental.publish');
    
Route::get('/landlord/rentals', [RentalController::class, 'index'])
    ->name('rentals.index');

Route::get('/landlord/rentals/{accommodation}', [RentalController::class, 'show'])
    ->name('rentals.show');

Route::get('/landlord/rentals/{accommodation}/edit', [RentalController::class, 'edit'])
    ->name('rentals.edit');

Route::put('/landlord/rentals/{accommodation}', [RentalController::class, 'update'])
    ->name('rentals.update');

Route::delete('/landlord/rentals/{accommodation}', [RentalController::class, 'destroy'])
    ->name('rentals.destroy');    

Route::get('/landlord/rentals/{accommodation}', [RentalController::class, 'show'])
    ->name('rentals.show');
Route::put('/landlord/rentals/{accommodation}', [RentalController::class, 'update'])
    ->name('rentals.update');  
Route::delete('/landlord/rental/photo/{photo}', [RentalController::class, 'deletePhoto'])
    ->name('rentals.photo.delete');

Route::post('/landlord/rental/{accommodation}/photos', [RentalController::class, 'uploadPhotos'])
    ->name('rentals.photos.upload');    
    
Route::get('/landlord/notifications', [NotificationController::class, 'index'])
    ->middleware(['auth','role:Landlord'])
    ->name('landlord.notifications');


Route::get('/landlord/notifications', [NotificationController::class, 'index'])
    ->name('landlord.notifications');

Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])
    ->name('notifications.read');

Route::patch('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])
    ->name('notifications.readAll');

Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])
    ->name('notifications.destroy');      

});


Route::get('/rentals/{accommodation}', [AccommodationController::class, 'show'])
    ->name('rentals.public.show');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:Landlord'])->group(function () {

    Route::get('/landlord/bookings', [App\Http\Controllers\Landlord\BookingManagementController::class, 'index'])
        ->name('landlord.bookings');

    Route::patch('/landlord/bookings/{booking}', [App\Http\Controllers\Landlord\BookingManagementController::class, 'update'])
        ->name('landlord.bookings.update');

});

Route::middleware(['auth', 'verified'])->group(function () {
    /*
|---------

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

   Route::get('/dashboard', function () {

    $role = optional(auth()->user()->role)->name;

    return match ($role) {
        'Student' => redirect()->route('student.dashboard'),
        'Landlord' => redirect()->route('landlord.dashboard'),
        'Business Owner' => redirect()->route('business.dashboard'),
        'Admin' => redirect()->route('admin.dashboard'),
        default => abort(403),
    };

})->middleware(['auth', 'verified'])->name('dashboard');
    /*
    |--------------------------------------------------------------------------
    | Marketplace
    |--------------------------------------------------------------------------
    */

    Route::get('/marketplace', [MarketplaceController::class, 'index'])
        ->name('marketplace.index');

    Route::get('/marketplace/create', [MarketplaceController::class, 'create'])
        ->name('marketplace.create');

    Route::post('/marketplace', [MarketplaceController::class, 'store'])
        ->name('marketplace.store');

    Route::get('/marketplace/{marketplace}', [MarketplaceController::class, 'show'])
        ->name('marketplace.show');
    Route::post(
    '/marketplace/{marketplace}/favorite',
    [MarketplaceFavoriteController::class, 'toggle']
)->name('marketplace.favorite');
Route::patch('/marketplace/{marketplace}/sold', [MarketplaceController::class, 'markSold'])
    ->name('marketplace.sold');
   
    /*
    |--------------------------------------------------------------------------
    | Marketplace Favorites
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/marketplace/{item}/favorite',
        [MarketplaceFavoriteController::class, 'toggle']
    )->name('marketplace.favorite');

    Route::get(
        '/saved-items',
        [MarketplaceFavoriteController::class, 'index']
    )->name('marketplace.saved');

    /*
    |--------------------------------------------------------------------------
    | Campus Hostels
    |--------------------------------------------------------------------------
    */

    Route::get('/campus-hostels', [AccommodationController::class, 'campus'])
        ->name('campus.index');

    Route::get('/campus-hostels/create', [AccommodationController::class, 'createCampus'])
        ->name('campus.create');

    Route::post('/campus-hostels', [AccommodationController::class, 'storeCampus'])
        ->name('campus.store');

    /*
    |--------------------------------------------------------------------------
    | Off Campus Rentals
    |--------------------------------------------------------------------------
    */

   Route::middleware(['auth'])->group(function () {

    Route::get('/rentals', [RentalBrowseController::class, 'index'])
        ->name('browse.rentals');

    Route::get('/rentals/{accommodation}', [RentalBrowseController::class, 'show'])
        ->name('browse.rental.show');

});
    /*
    |--------------------------------------------------------------------------
    | Shared Accommodation Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/accommodation/{accommodation}', [AccommodationController::class, 'show'])
        ->name('accommodation.show');

    /*
    |--------------------------------------------------------------------------
    | Saved Accommodation
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/accommodation/{accommodation}/save',
        [SavedAccommodationController::class, 'toggle']
    )->name('accommodation.save');

    Route::get(
        '/saved-accommodation',
        [SavedAccommodationController::class, 'index']
    )->name('accommodation.saved');

    /*
    |--------------------------------------------------------------------------
    | Accommodation Pass
    |--------------------------------------------------------------------------
    */

    Route::get('/pass', [AccommodationPassController::class, 'index'])
        ->name('pass.index');

    Route::post('/pass/buy', [AccommodationPassController::class, 'purchase'])
        ->name('pass.buy');

    /*
    |--------------------------------------------------------------------------
    | Notes
    |--------------------------------------------------------------------------
    */

    Route::get('/notes', [NoteController::class, 'index'])
        ->name('notes.index');

    Route::get('/notes/create', [NoteController::class, 'create'])
        ->name('notes.create');

    Route::post('/notes', [NoteController::class, 'store'])
        ->name('notes.store');

    Route::get('/notes/{note}/preview', [NoteController::class, 'preview'])
        ->name('notes.preview');

    Route::post('/notes/{note}/rate', [RatingController::class, 'store'])
        ->name('ratings.store');

    Route::post('/notes/{note}/favorite', [FavoriteController::class, 'toggle'])
        ->name('favorites.toggle');
    /*
|--------------------------------------------------------------------------
| Announcements
|--------------------------------------------------------------------------
*/

Route::resource('announcements', AnnouncementController::class)
    ->middleware(['auth']);
    /*
    |--------------------------------------------------------------------------
    | Past Papers
    |--------------------------------------------------------------------------
    */

    Route::get('/past-papers', [PastPaperController::class, 'index'])
        ->name('pastpapers.index');

    Route::get('/past-papers/create', [PastPaperController::class, 'create'])
        ->name('pastpapers.create');

    Route::post('/past-papers', [PastPaperController::class, 'store'])
        ->name('pastpapers.store');

    Route::get('/past-papers/{pastpaper}/preview', [PastPaperController::class, 'preview'])
        ->name('pastpapers.preview');

    /*
    |--------------------------------------------------------------------------
    | Legacy Hostel Module
    |--------------------------------------------------------------------------
    */

    Route::get('/hostels', [HostelController::class, 'index'])
        ->name('hostels.index');

    Route::get('/hostels/create', [HostelController::class, 'create'])
        ->name('hostels.create');

    Route::post('/hostels', [HostelController::class, 'store'])
        ->name('hostels.store');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
        Route::get('/student-services', [StudentServiceController::class, 'index'])
    ->name('student-services.index');

Route::post('/student-services', [StudentServiceController::class, 'store'])
    ->name('student-services.store');

    /*
|--------------------------------------------------------------------------
| Lost & Found
|--------------------------------------------------------------------------
*/
Route::get('/lost-found', [LostFoundController::class, 'index'])
    ->name('lostfound.index');

Route::get('/lost-found/create', [LostFoundController::class, 'create'])
    ->name('lostfound.create');

Route::post('/lost-found', [LostFoundController::class, 'store'])
    ->name('lostfound.store');

Route::get('/lost-found/{lostfound}', [LostFoundController::class, 'show'])
    ->name('lostfound.show');


Route::get('/businesses/{business}/edit', [BusinessController::class, 'edit'])
    ->name('businesses.edit');
Route::get('/businesses/create', [BusinessController::class, 'create'])
    ->name('businesses.create');

Route::post('/businesses', [BusinessController::class, 'store'])
    ->name('businesses.store');    

Route::put('/businesses/{business}', [BusinessController::class, 'update'])
    ->name('businesses.update');

Route::delete('/businesses/{business}', [BusinessController::class, 'destroy'])
    ->name('businesses.destroy');

Route::get('/business/{business}/edit', [BusinessController::class, 'edit'])
    ->name('businesses.edit');

Route::put('/business/{business}', [BusinessController::class, 'update'])
    ->name('businesses.update');  
Route::get('/businesses/{business}/gallery', [BusinessGalleryController::class, 'index'])
    ->name('business.gallery');

Route::post('/businesses/{business}/gallery', [BusinessGalleryController::class, 'store'])
    ->name('business.gallery.store');

Route::delete('/gallery/{image}', [BusinessGalleryController::class, 'destroy'])
    ->name('business.gallery.destroy');

Route::patch('/gallery/{image}/cover', [BusinessGalleryController::class, 'cover'])
    ->name('business.gallery.cover');   
    
// Student sends message
Route::post('/businesses/{business}/message', [MessageController::class, 'store'])
    ->name('messages.store');

// Business owner views inbox
Route::get('/business/messages', [MessageController::class, 'index'])
    ->name('messages.index');

// Business owner replies
Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])
    ->name('messages.reply');    
     
Route::get('/business/messages', [BusinessMessageController::class, 'index'])
    ->name('business.messages');   

Route::get('/business/messages', [BusinessMessageController::class, 'index'])
    ->name('business.messages');

Route::get('/business/messages/{message}', [BusinessMessageController::class, 'show'])
    ->name('business.messages.show');

Route::post('/business/messages/{message}/reply', [BusinessMessageController::class, 'reply'])
    ->name('business.messages.reply');     
    
    
/*
|--------------------------------------------------------------------------
| Role Dashboards
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/student/dashboard', [DashboardController::class, 'index'])
        ->middleware('role:Student')
        ->name('student.dashboard');

    Route::get('/landlord/dashboard', [LandlordDashboardController::class, 'index'])
        ->middleware('role:Landlord')
        ->name('landlord.dashboard');

   Route::get('/business/dashboard', [BusinessController::class, 'dashboard'])
    ->middleware('role:Business Owner')
    ->name('business.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })
        ->middleware('role:Admin')
        ->name('admin.dashboard');
    Route::post(
    '/rentals/{accommodation}/request',
    [BookingRequestController::class, 'store']
)->name('booking.request');    
    Route::get(
    '/bookings/{accommodation}/create',
    [BookingRequestController::class, 'create']
)->name('bookings.create');

Route::post(
    '/bookings/{accommodation}',
    [BookingRequestController::class, 'store']
)->name('bookings.store'); 

});
Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])
    ->name('notifications.read');

Route::post('/landlord/rental/publish',
    [RentalWizardController::class, 'publish'])
    ->name('rental.publish');        

Route::resource('products', ProductController::class);

Route::patch('/products/{product}/featured',
    [ProductController::class, 'featured'])
    ->name('products.featured');    
Route::get('/marketplace', [StudentBusinessController::class, 'index'])
    ->name('student.marketplace');

Route::middleware(['auth','student'])->group(function () {

    Route::get('/marketplace',
        [StudentBusinessController::class,'index'])
        ->name('student.marketplace');

});    

Route::middleware(['auth', 'role:Student'])->group(function () {

    Route::get('/businesses', [StudentBusinessController::class, 'index'])
        ->name('businesses.index');
}); 

Route::middleware(['auth', 'student'])->group(function () {

    Route::get('/businesses', [StudentBusinessController::class, 'index'])
        ->name('businesses.index');

    Route::get('/businesses/{business}', [StudentBusinessController::class, 'show'])
        ->name('businesses.show');

});

Route::middleware(['auth', 'verified', 'student'])->group(function () {

    Route::get('/businesses', [StudentBusinessController::class, 'index'])
        ->name('businesses.index');

    Route::get('/businesses/{business}', [StudentBusinessController::class, 'show'])
        ->name('business.preview');

});

Route::get('/businesses/{business}', [StudentBusinessController::class, 'show'])
    ->name('business.preview');

Route::middleware(['auth'])->group(function () {

    Route::get('/student/messages', [StudentMessageController::class, 'index'])
        ->name('student.messages');

    Route::get('/student/messages/{message}', [StudentMessageController::class, 'show'])
        ->name('student.messages.show');

    Route::post('/student/messages/{message}/send',
    [StudentMessageController::class, 'send'])
    ->name('student.messages.send');    

});

});

Route::middleware(['auth', 'role:Business Owner'])->group(function () {

    Route::resource('business/advertisements', AdvertisementController::class)
        ->names([
            'index'   => 'business.advertisements.index',
            'create'  => 'business.advertisements.create',
            'store'   => 'business.advertisements.store',
            'show'    => 'business.advertisements.show',
            'edit'    => 'business.advertisements.edit',
            'update'  => 'business.advertisements.update',
            'destroy' => 'business.advertisements.destroy',
        ]);

});

Route::post('/businesses/{business}/reviews', [BusinessReviewController::class, 'store'])
    ->name('business.reviews.store');
Route::post(
    '/businesses/{business}/reviews',
    [BusinessReviewController::class, 'store']
)->name('business.reviews.store');  

Route::post('/business/messages/{message}/reply',
    [BusinessMessageController::class, 'reply'])
    ->name('business.messages.reply');

require __DIR__.'/auth.php';