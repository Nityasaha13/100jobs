<?php

use App\Http\Controllers\JobsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Models\User;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Auth::routes();


Route::get('/jobs',[JobsController::class, 'index'])->name('jobs'); 



Route::get('/profile',[UserProfileController::class,'profile'])->name('profile');
Route::get('/post-job',[UserProfileController::class,'post_job'])->name('post-job');
Route::get('/my-jobs',[UserProfileController::class,'my_jobs'])->name('my-jobs');
Route::get('/applied-jobs',[UserProfileController::class,'applied_jobs'])->name('applied-jobs');
Route::get('/saved-jobs',[UserProfileController::class,'saved_jobs'])->name('saved-jobs');

