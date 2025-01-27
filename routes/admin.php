<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\CourseLanguageController;
use App\Http\Controllers\Admin\CourseLevelController;
use App\Http\Controllers\Admin\CourserCategoryController;
use App\Http\Controllers\Admin\SubCourserCategoryController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware"=>"guest:admin","prefix"=>"admin","as"=>"admin."],function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(["middleware"=>"auth:admin","prefix"=>"admin","as"=>"admin."],function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
    /**
     * Instructor request application
     */
    Route::get('instructor-request',[AdminDashboardController::class,'instructorRequest'])->name('instructorRequest');
    Route::get('instructor-request/download/{user}',[AdminDashboardController::class,'download'])->name('instructorRequestDownload');
    Route::put('instructor-request/{user}',[AdminDashboardController::class,'instructorRequestStore'])->name('instructorRequestStore');
    /**
     * Course Management
     */
    Route::resource('course-language', CourseLanguageController::class);
    Route::resource('course-level', CourseLevelController::class);
    Route::resource('course-category', CourserCategoryController::class);
    Route::controller(SubCourserCategoryController::class)->group(function () {
        Route::get('course-category/{course_category}', 'index')->name('sub_course_category.index');
        Route::get('course-category/{course_category}/create', 'create')->name('sub_course_category.create');
//        Route::get('course-category/{course_category}/edit', 'edit')->name('sub_course_category.edit');
        Route::post('course-category/{course_category}', 'store')->name('sub_course_category.store');
//        Route::put('course-category/{course_category}/update', 'update')->name('sub_course_category.update');
    });
});
