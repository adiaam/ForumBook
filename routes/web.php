<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Diese Reiehnfolge muss berücksichtigt werden, weil '/p/{port}' übernimmt alle Routes.
Route::get('/p/create', [PostsController::class, 'create']);
Route::get('/p/{post}', [PostsController::class, 'show']);

Route::post('/p',[PostsController::class,'store']);

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
// Dieser Route zeigt EDIT-Form an.
Route::get('/profile/{user}/edit',[ProfilesController::class, 'edit'])->name('profile.edit');
// this will actually do the update/edit process
Route::patch('/profile/{user}',[ProfilesController::class, 'update'])->name('profile.update');

