<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/jobs', [JobsController::class, 'get_all_jobs'])->name('api.all-jobs');
Route::get('/saved/{uid}/{jid}', [JobsController::class, 'get_user_jobs'])->name('api.user-jobs');
Route::get('/applied/{uid}/{jid}', [JobsController::class, 'get_applied_jobs'])->name('api.applied-jobs');