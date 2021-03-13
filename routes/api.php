<?php

use App\Http\Controllers\Api\ColorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['cors', 'json.response']], function () {

    // public routes
    Route::post('/login', [ApiAuthController::class,'login'])->name('login.api');
    Route::post('/register',[ApiAuthController::class,'register'])->name('register.api');
    

});
Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
    Route::post('/logout', [ApiAuthController::class,'logout'])->name('logout.api');
    /////////////// color /////////////////
    Route::post('/color', [ColorsController::class,'index'])->name('color.index');
    Route::post('/color/store', [ColorsController::class,'store'])->name('color.store');
    Route::post('/color/update', [ColorsController::class,'update'])->name('color.update');
    Route::post('/color/delete', [ColorsController::class,'delete'])->name('color.delete');
});