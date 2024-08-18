<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SportCategoryController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['middleware'=> 'permission:Employee'], function () {

Route::apiResource('articles',ArticleController::class);
Route::apiResource('categories',CategoryController::class);
Route::apiResource('facilities',FacilityController::class);
Route::apiResource('images',ImageController::class);
Route::apiResource('videos',VideoController::class);
Route::apiResource('members',MemberController::class);
Route::apiResource('offers',OfferController::class);
Route::apiResource('payments',PaymentController::class);
Route::apiResource('plans',PlanController::class);
Route::apiResource('rooms',RoomController::class);
Route::apiResource('sports',SportController::class);
Route::apiResource('sport_categories',SportCategoryController::class);
Route::apiResource('subscriptions',SubscriptionController::class);
Route::apiResource('tags',TagController::class);
Route::put('/subscriptions/renew', [SubscriptionController::class,'renew']);
Route::put('/subscriptions/cancel', [SubscriptionController::class,'cancel']);
Route::post('image/store', [ImageController::class,'store']);
Route::post('video/store', [VideoController::class,'store']);
Route::delete('image/delete/{image}', [ImageController::class,'destroy']);
Route::delete('video/delete/{video}', [VideoController::class,'destroy']);
Route::get('/index', [FormController::class,'index']);

});
