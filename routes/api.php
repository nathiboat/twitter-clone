<?php


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index'])->name('timeline');

Route::post('/tweets', [App\Http\Controllers\Api\Tweets\TweetController::class, 'store']);

