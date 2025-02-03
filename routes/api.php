<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\GendersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\BodyShapesController;
use App\Http\Controllers\FollowingsController;
use App\Http\Controllers\AbuseReportsController;
use App\Http\Controllers\FavoriteMusicController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\FavoriteVideosController;
use App\Http\Controllers\MusicCategoriesController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\OutfitTypesController;
use App\Http\Controllers\UnlikesController;
use App\Http\Controllers\VideoCategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::get('abuse-reports', [AbuseReportsController::class, 'index']);
Route::get('abuse-reports/{report}', [AbuseReportsController::class, 'show']);

Route::get('body-shapes', [BodyShapesController::class, 'index']);
Route::get('body-shappe/{shape}', [BodyShapesController::class, 'show']);

Route::get('colors', [ColorsController::class, 'index']);
Route::get('colors/{color}', [ColorsController::class, 'show']);

Route::get('comments', [CommentsController::class, 'index']);
Route::get('comments/{comment}', [CommentsController::class, 'show']);

Route::get('favorite-music', [FavoriteMusicController::class, 'index']);
Route::get('favorite-music/{music}', [FavoriteMusicController::class, 'show']);

Route::get('favorite-videos', [FavoriteVideosController::class, 'index']);
Route::get('favorite-videos/{video}', [FavoriteVideosController::class, 'show']);

Route::get('followers', [FollowersController::class, 'index']);
Route::get('followers/{follower}', [FollowersController::class, 'show']);

Route::get('followings', [FollowingsController::class, 'index']);
Route::get('followings/{following}', [FollowingsController::class, 'show']);

Route::get('genders', [GendersController::class, 'index']);
Route::get('genders/{gender}', [GendersController::class, 'show']);

Route::get('likes', [LikesController::class, 'index']);
Route::get('likes/{like}', [LikesController::class, 'show']);

Route::get('locations', [LocationController::class, 'index']);
Route::get('locations/{location}', [LocationController::class, 'show']);

Route::get('music-categories', [MusicCategoriesController::class, 'index']);
Route::get('music-categories/{category}', [MusicCategoriesController::class, 'show']);

Route::get('music', [MusicController::class, 'index']);
Route::get('music/{music}', [MusicController::class, 'show']);

Route::get('notifications', [NotificationsController::class, 'index']);
Route::get('notifications/{notification}', [NotificationsController::class, 'show']);

Route::get('outfits', [OutfitTypesController::class, 'index']);
Route::get('outfits/{outfit}', [OutfitTypesController::class, 'show']);

Route::get('profiles', [ProfilesController::class, 'index']);
Route::get('profiles/{profile}', [ProfilesController::class, 'show']);

Route::get('unlikes', [UnlikesController::class, 'index']);
Route::get('unlikes/{unlike}', [UnlikesController::class, 'show']);

Route::get('users', [UsersController::class, 'index']);
Route::get('users/{user}', [UsersController::class, 'show']);
Route::get('users/{user}/videos', [UsersController::class, 'videos']);

Route::get('video-categories', [VideoCategoriesController::class, 'index']);
Route::get('video-categories/{category}', [VideoCategoriesController::class, 'show']);

Route::get('videos', [VideosController::class, 'index']);
Route::get('videos/{video}', [VideosController::class, 'show']);

Route::get('videos/{video}/likes', [VideosController::class, 'likes']);
Route::get('videos/{video}/unlikes', [VideosController::class, 'unlikes']);
Route::get('videos/{video}/comments', [VideosController::class, 'comments']);
Route::get('videos/{video}/reports', [VideosController::class, 'reports']);
Route::get('videos/{video}/favorites', [VideosController::class, 'favorites']);

Route::get('views', [ViewsController::class, 'index']);
Route::get('views/{view}', [ViewsController::class, 'show']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/