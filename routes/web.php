<?php

use App\Http\Controllers\Admin\MangaController as AdminMangaController;
use App\Http\Controllers\User\MangaController as UserMangaController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('mangas');
})->middleware(['auth', 'verified'])->name('dashboard');

//Instead of creating a new route::get for every function of the MangaController, we use the Route::resource to automatically create it
//Using the middleware to authenticate that the user is viewing what they are allowed to. If not authenticated, user is brought back to login page

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::resource('/admin/mangas', AdminMangaController::class)->middleware(['auth'])->names('admin.mangas');
Route::resource('/user/mangas', UserMangaController::class)->middleware(['auth'])->names('user.mangas')->only(['index', 'show']);   