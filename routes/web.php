<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateProfileInformationController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class);

Route::middleware('auth')->group(function () {
    Route::get('/timeline', TimelineController::class)->name('timeline');
    Route::post('status', [StatusController::class, 'store'])->name('status.store');

    Route::get('explore', ExploreUserController::class)->name('users.index');

    Route::prefix('profile')->group(function () {
        Route::put('update', [updateProfileInformationController::class, 'update'])->name('profile.update');
        Route::get('edit', [UpdateProfileInformationController::class, 'edit'])->name('profile.edit');

        Route::get('password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
        Route::put('password/edit', [UpdatePasswordController::class, 'update']);

        Route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
        Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
        Route::get('{user}', ProfileInformationController::class)->name('profile');
    });
    // Route::get('profile/{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
    // Route::post('profile/{user}', [FollowingController::class, 'store'])->name('following.store');
    // Route::get('profile/{user}/{following}', [FollowingController::class, 'following'])->name('profile.following');
    // Route::get('profile/{user}/{follower}', [FollowingController::class, 'follower'])->name('profile.follower');
    // Route::get('profile/{user}', ProfileInformationController::class)->name('profile');

});


require __DIR__ . '/auth.php';
