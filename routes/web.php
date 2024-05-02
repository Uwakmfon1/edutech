<?php

use App\Http\Controllers\GoogleAuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return "Hello people";
    return User::all();
    // return ['Laravel' => app()->version()];
});
Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);

// Route::get('')

require __DIR__.'/auth.php';
