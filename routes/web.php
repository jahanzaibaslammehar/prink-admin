<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\GendersController;
use App\Http\Controllers\AppUsersController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\HashtagsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BodyShapesController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\OutfitTypesController;
use App\Http\Controllers\SystemUsersController;
use App\Http\Controllers\AbuseReportsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MusicCategoriesController;
use App\Http\Controllers\VideoCategoriesController;
use App\Http\Controllers\VideosController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function () {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});

Route::middleware(['auth', 'is-admin'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [BodyShapesController::class, 'index'])->name('dashboard');

    Route::controller(BodyShapesController::class)->group(function () {
        Route::get('body-shape-types', 'index')->name('body-types.index');
        Route::post('body-shape-types', 'create')->name('body-types.create');
        Route::get('body-shape-types/{shape}', 'edit')->name('body-types.edit');
        Route::put('body-shape-types/{shape}', 'update')->name('body-types.update');
        Route::delete('body-shape-types/{shape}', 'destory')->name('body-types.delete');
    });

    Route::controller(ColorsController::class)->group(function () {
        Route::get('colors', 'index')->name('colors.index');
        Route::post('colors', 'create')->name('colors.create');
        Route::get('colors/{color}', 'edit')->name('colors.edit');
        Route::put('colors/{color}', 'update')->name('colors.update');
        Route::delete('colors/{color}', 'destory')->name('colors.delete');
    });

    Route::controller(GendersController::class)->group(function () {
        Route::get('genders', 'index')->name('genders.index');
        Route::post('genders', 'create')->name('genders.create');
        Route::get('genders/{gender}', 'edit')->name('genders.edit');
        Route::put('genders/{gender}', 'update')->name('genders.update');
        Route::delete('genders/{gender}', 'destory')->name('genders.delete');
    });

    Route::controller(HashtagsController::class)->group(function () {
        Route::get('hashtags', 'index')->name('hashtags.index');
        Route::post('hashtags', 'create')->name('hashtags.create');
        Route::get('hashtags/{hashtag}', 'edit')->name('hashtags.edit');
        Route::put('hashtags/{hashtag}', 'update')->name('hashtags.update');
        Route::delete('hashtags/{hashtag}', 'destory')->name('hashtags.delete');
    });

    Route::controller(LocationController::class)->group(function () {
        Route::get('locations', 'index')->name('locations.index');
        Route::post('locations', 'create')->name('locations.create');
        Route::get('locations/{location}', 'edit')->name('locations.edit');
        Route::put('locations/{location}', 'update')->name('locations.update');
        Route::delete('locations/{location}', 'destory')->name('locations.delete');
    });

    Route::controller(MusicCategoriesController::class)->group(function () {
        Route::get('music-category', 'index')->name('music-category.index');
        Route::post('music-category', 'create')->name('music-category.create');
        Route::get('music-category/{category}', 'edit')->name('music-category.edit');
        Route::put('music-category/{category}', 'update')->name('music-category.update');
        Route::delete('music-category/{category}', 'destory')->name('music-category.delete');
    });

    Route::controller(VideoCategoriesController::class)->group(function () {
        Route::get('video-category', 'index')->name('video-category.index');
        Route::post('video-category', 'create')->name('video-category.create');
        Route::get('video-category/{category}', 'edit')->name('video-category.edit');
        Route::put('video-category/{category}', 'update')->name('video-category.update');
        Route::delete('video-category/{category}', 'destory')->name('video-category.delete');
    });

    Route::controller(OutfitTypesController::class)->group(function () {
        Route::get('outfit-types', 'index')->name('outfit-types.index');
        Route::post('outfit-types', 'create')->name('outfit-types.create');
        Route::get('outfit-types/{type}', 'edit')->name('outfit-types.edit');
        Route::put('outfit-types/{type}', 'update')->name('outfit-types.update');
        Route::delete('outfit-types/{type}', 'destory')->name('outfit-types.delete');
    });

    Route::controller(SystemUsersController::class)->group(function () {
        Route::get('system-users', 'index')->name('system-users.index');
        Route::post('system-users', 'create')->name('system-users.create');
        Route::get('system-users/{user}', 'edit')->name('system-users.edit');
        Route::put('system-users/{user}', 'update')->name('system-users.update');
        Route::delete('system-users/{user}', 'destory')->name('system-users.delete');
    });

    Route::controller(AppUsersController::class)->group(function () {
        Route::get('app-users', 'index')->name('app-users.index');
        Route::get('app-users/list', 'list')->name('app-users.list');
        Route::get('app-users/{user}', 'show')->name('app-users.view');
        Route::get('app-users/{user}/disable', 'disable')->name('app-users.disable');
        Route::get('app-users/{user}/verify', 'verify')->name('app-users.verify');

        Route::get('app-users/{user}/videos/{video}', 'toggleVideo')->name('app-users.video.toggle');
    });

    Route::controller(VideosController::class)->group(function () {
        Route::get('videos', 'index')->name('videos.index');
        Route::get('videos/list', 'list')->name('videos.list');
    });

    Route::controller(User::class)->group(function () {
        Route::get('settings', 'index')->name('settings');
    });

    Route::controller(AbuseReportsController::class)->group(function () {
        Route::get('abuse-reports/list/{type?}', 'list')->name('abuse-reports.list');
        Route::get('abuse-reports/{type?}', 'index')->name('abuse-reports.index');

        Route::get('abuse-reports/{report}/edit', 'edit')->name('abuse-reports.edit');
        Route::put('abuse-reports/{report}/update', 'update')->name('abuse-reports.update');
    });

    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('subscriptions', 'index')->name('subscriptions.index');
        Route::get('subscriptions/list', 'list')->name('subscriptions.list');
    });

    Route::controller(HelpCenterController::class)->group(function () {
        Route::get('help-center', 'index')->name('help-center.index');
        Route::get('help-center/list', 'list')->name('help-center.list');
        Route::get('help-center/{help}', 'show')->name('help-center.show');
    });

    /*
    Route::controller(::class)->group(function () {
        Route::get('', 'index')->name('.index');
        Route::post('', 'create')->name('.create');
        Route::get('/{}', 'edit')->name('.edit');
        Route::put('/{}', 'update')->name('.update');
        Route::delete('/{}', 'destory')->name('.delete');
    });
    */
});
