<?php

use App\Http\Controllers\FrontEnd\InstructorDashboardController;
use App\Http\Controllers\FrontEnd\ProfileUpdateController;
use App\Http\Controllers\FrontEnd\StudentDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

/**
 * --------------------------------------------------------------------------
 *  Home Routes
 * --------------------------------------------------------------------------
 */

Route::get('/', function () {
    return view('user.pages.index');
})->name('home');

///**
// * --------------------------------------------------------------------------
// *  Student/Instructor Routes
// * --------------------------------------------------------------------------
// */
//
//Route::group(['middleware' => ['auth', 'verified', 'check-role:both'], "prefix" => "both", "as" => "both."], function () {
//    Route::get('/dashboard', [StudentDashboardController::class, "index"])->name('dashboard');
//    Route::get('/become-instructor',[StudentDashboardController::class,'instructorRequest'])->name('become-instructor');
//    Route::post('/become-instructor',[StudentDashboardController::class,'instructorRequestSubmit'])->name('request.submit');
//    Route::get('/profileUpdate',[ProfileUpdateController::class,'index'])->name('profileUpdate');
//    Route::put('/profileUpdate', [ProfileUpdateController::class, 'updateUserPersonalInformation'])->name('personalInformationUpdate');
//    Route::put('/profileSocialInformationUpdate', [ProfileUpdateController::class, 'updateSocialInformation'])->name('socialInformationUpdate');
//
//});

/**
 * --------------------------------------------------------------------------
 *  Student Routes
 * --------------------------------------------------------------------------
 */

Route::group(['middleware' => ['auth', 'verified', 'check-role:student'], "prefix" => "student", "as" => "student."], function () {
    Route::get('/dashboard', [StudentDashboardController::class, "index"])->name('dashboard');
    Route::get('/become-instructor',[StudentDashboardController::class,'instructorRequest'])->name('become-instructor');
    Route::post('/become-instructor',[StudentDashboardController::class,'instructorRequestSubmit'])->name('request.submit');
    Route::get('/profileUpdate',[ProfileUpdateController::class,'index'])->name('profileUpdate');
    Route::put('/profileUpdate', [ProfileUpdateController::class, 'updateUserPersonalInformation'])->name('personalInformationUpdate');
    Route::put('/profileSocialInformationUpdate', [ProfileUpdateController::class, 'updateSocialInformation'])->name('socialInformationUpdate');
    Route::put('/profileUpdatePassword', [ProfileUpdateController::class, 'updatePassword'])->name('passwordUpdate');

});


/**
 * --------------------------------------------------------------------------
 *  Instructor Routes
 * --------------------------------------------------------------------------
 */

Route::group(['middleware' => ['auth', 'verified', 'check-role:instructor'], "prefix" => "instructor", "as" => "instructor."], function () {
    Route::get('/dashboard', [InstructorDashboardController::class, "index"])->name('dashboard');

});

/**
 * --------------------------------------------------------------------------
 *  Profile Routes
 * --------------------------------------------------------------------------
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/**
 * --------------------------------------------------------------------------
 *  Third Party Auth Routes
 * --------------------------------------------------------------------------
 */
Route::group(['middleware' => ['web']], function () {
   Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider'])->name('social.redirect');
   Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback'])->name('social.callback');
});
/**
 * --------------------------------------------------------------------------
 *  Admin Routes
 * --------------------------------------------------------------------------
 */
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

