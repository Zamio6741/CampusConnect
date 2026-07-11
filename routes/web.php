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

Route::middleware(['auth', 'role:Landlord'])->group(function () {

    Route::get('/landlord/rental/create/step1', [RentalWizardController::class, 'step1'])
        ->name('rental.step1');

    Route::post('/landlord/rental/create/step1', [RentalWizardController::class, 'storeStep1'])
        ->name('rental.step1.store');

    Route::get('/landlord/rental/create/step2', [RentalWizardController::class, 'step2'])
        ->name('rental.step2');

    Route::post('/landlord/rental/create/step2', [RentalWizardController::class, 'storeStep2'])
        ->name('rental.step2.store');
    Route::get('/landlord/rental/create/step3', [RentalWizardController::class, 'step3'])
        ->name('rental.step3');

    Route::get('/landlord/rental/create/step4', [RentalWizardController::class, 'step4'])
        ->name('rental.step4');

    Route::get('/landlord/rental/create/step5', [RentalWizardController::class, 'step5'])
        ->name('rental.step5');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    /*
|--------------------------------------------------------------------------
| Bookings
|--------------------------------------------------------------------------
*/

Route::post(
    '/accommodation/{accommodation}/book',
    [BookingController::class, 'store']
)->name('bookings.store');

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

    Route::get('/rentals', [AccommodationController::class, 'rentals'])
        ->name('rentals.index');

    Route::get('/rentals/create', [AccommodationController::class, 'createRental'])
        ->name('rentals.create');

    Route::post('/rentals', [AccommodationController::class, 'storeRental'])
        ->name('rentals.store');

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

Route::resource('businesses', BusinessController::class);
Route::get('/businesses/{business}/edit', [BusinessController::class, 'edit'])
    ->name('businesses.edit');

Route::put('/businesses/{business}', [BusinessController::class, 'update'])
    ->name('businesses.update');

Route::delete('/businesses/{business}', [BusinessController::class, 'destroy'])
    ->name('businesses.destroy');
    
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

    Route::get('/business/dashboard', function () {
        return view('business.dashboard');
    })
        ->middleware('role:Business Owner')
        ->name('business.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })
        ->middleware('role:Admin')
        ->name('admin.dashboard');

});
Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])
    ->name('notifications.read');

});
require __DIR__.'/auth.php';