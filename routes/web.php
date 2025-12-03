<?php

use App\Livewire\Jobs;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::view('/' , 'home');
Route::view('/contact', 'contact');

Route::get('/jobs/filter', [JobController::class, 'filter']);

Route::get('/jobs/load-more', [JobController::class, 'loadMore']);

Route::resource('jobs', JobController::class);





//Auth
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');
