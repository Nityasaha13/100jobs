<?php

use App\Http\Controllers\ApplyJobsController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UserAvatarController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\User\PublicProfileController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();


//Jobs
Route::get('/all-jobs',[JobsController::class, 'index'])->name('jobs');
Route::get('/search-result', [JobsController::class, 'search_job'])->name('search');
Route::get('/home-search', [JobsController::class, 'home_search_job'])->name('home-search');
Route::get('/job/{id}',[JobsController::class, 'show'])->name('single-job'); 


//Jobs Category
Route::get('/category/{name}',[JobCategoryController::class, 'category_page'])->name('category');


//Public user profile
Route::get('/user/{id}', [PublicProfileController::class, 'index'])->name('public-profile');


Route::group(['middleware' => 'auth'], function(){

    //Show profile pages
    Route::get('/profile',[UserProfileController::class,'profile'])->name('profile');
    Route::get('/post-job',[UserProfileController::class,'post_job'])->name('post-job');
    Route::get('/my-jobs',[UserProfileController::class,'my_jobs'])->name('my-jobs');
    Route::get('/applied-jobs',[UserProfileController::class,'applied_jobs'])->name('applied-jobs');
    Route::get('/saved-jobs',[UserProfileController::class,'saved_jobs'])->name('saved-jobs');


    //For profile
    Route::patch('/profile-avatar', [UserAvatarController::class, 'update'])->name('profile-avatar');
    Route::put('/update-profile',[UpdateProfileController::class, 'update'])->name('update-profile');
    Route::get('/edit-profile', [UpdateProfileController::class, 'edit'])->name('edit-profile');


    //For educations
    Route::get('/create-education', [EducationController::class, 'create'])->name('create-education'); 
    Route::post('/add-education',[EducationController::class, 'store'])->name('add-education');
    Route::get('/edit-edication/{eduid}', [EducationController::class, 'edit'])->name('edit-education');
    Route::put('/update-education/{eduid}' , [EducationController::class, 'update'])->name('update-education');
    Route::get('/delete-education/{eduid}' , [EducationController::class, 'destroy'])->name('delete-education');


    //For certifications
    Route::post('/add-certification',[CertificationController::class, 'store'])->name('add-certification');
    Route::get('/add-certification',[CertificationController::class, 'create'])->name('create-certification');
    Route::get('/edit-certification/{cerid}', [CertificationController::class, 'edit'])->name('edit-certification');
    Route::put('/update-certification/{cerid}' , [CertificationController::class, 'update'])->name('update-certification');
    Route::get('/delete-certification/{cerid}' , [CertificationController::class, 'destroy'])->name('delete-certification');


    //For experiences
    Route::post('/add-experience',[ExperienceController::class, 'store'])->name('add-experience');
    Route::get('/add-experience',[ExperienceController::class, 'create'])->name('create-experience');
    Route::get('/edit-experience/{expid}', [ExperienceController::class, 'edit'])->name('edit-experience');
    Route::put('/update-experience/{expid}' , [ExperienceController::class, 'update'])->name('update-experience');
    Route::get('/delete-experience/{expid}' , [ExperienceController::class, 'destroy'])->name('delete-experience');


    //For jobs
    Route::post('/create-job',[JobsController::class,'store'])->name('create-job');
    Route::get('/edit-job/{jobid}',[JobsController::class,'edit'])->name('edit-job');
    Route::put('/update-job/{jobid}',[JobsController::class,'update'])->name('update-job');
    Route::get('/delete-job/{jobid}',[JobsController::class,'destroy'])->name('delete-job');


    //For applied jobs
    Route::post('/submit-application',[ApplyJobsController::class,'apply'])->name('submit-job-application');
    Route::get('/remove-appliedjob/{jobid}', [ApplyJobsController::class, 'delete'])->name('remove-appliedjob');

    
    //Applicants
    Route::get('/{jobid}/candidates', [CandidatesController::class,'index'])->name('candidates');


    //Posts
    Route::get('/posts/create', [PostsController::class, 'create'])->name('create-post');
});