<?php

use App\Models\Job;
use App\Jobs\TranslateJob;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('test', function(){
    $job = Job::first();

    TranslateJob::dispatch($job);
   
    return 'Done';
});

Route::view('/' , 'home');
Route::view('/contact', 'contact');

Route::get('/jobs/filter', [JobController::class, 'filter']);

Route::get('/jobs/load-more', [JobController::class, 'loadMore']);

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->name('jobs-job.update')
    ->middleware('auth')
    ->can('update-job', 'job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->name('jobs-job.destroy')
    ->middleware('auth')
    ->can('delete-job', 'job');   

// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');





//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
    // ->middleware('guest')
    // ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);
