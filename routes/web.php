<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Profile;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        $profiles = Profile::all();
        return view('admin.admin_dashboard',compact('profiles'));
    })->name('admin.dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
     Route::get('user/dashboard', function () {
         return view('user.user_dashboard');
    })->name('user.dashboard');
});


Route::controller(ProfileController::class)->group(function () {
   Route::post('profile/store', 'store')->name('profile.store');
});
