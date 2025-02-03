<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoryController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
   // Story Resource Routes
//    Route::resource('stories', StoryController::class);

    Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
    Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create');
    Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');
    Route::get('/stories/{story}', [StoryController::class, 'show'])->name('stories.show');
    Route::get('/stories/{story}/edit', [StoryController::class, 'edit'])->name('stories.edit');
    Route::put('/stories/{story}', [StoryController::class, 'update'])->name('stories.update');
    Route::delete('/stories/{story}', [StoryController::class, 'destroy'])->name('stories.destroy');


   // Episode Management Routes
   Route::post('/stories/{story}/episodes', [EpisodeController::class, 'store'])->name('episodes.store');
   Route::get('/episodes/{episode}/edit', [EpisodeController::class, 'edit'])->name('episodes.edit');
   Route::put('/episodes/{episode}', [EpisodeController::class, 'update'])->name('episodes.update');
   Route::delete('/episodes/{episode}', [EpisodeController::class, 'destroy'])->name('episodes.destroy');
});


Route::middleware(['auth'])->group(function () {

    /// Normal User function
    Route::get('/account', [UserController::class, 'show'])->name('user.account');
    Route::get('/account/edit', [UserController::class, 'edit'])->name('user.account.edit');
    Route::put('/account', [UserController::class, 'update'])->name('user.account.update');
    Route::delete('/account', [UserController::class, 'destroy'])->name('user.account.delete');


    // Admin user funstions
    // Route::get('/users', [UserController::class, 'index'])->name('users.index'); // List all users
    // Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show'); // View user details
    // Route::post('/users/{id}/rename', [UserController::class, 'rename'])->name('users.rename'); // Rename user
    // Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete user
});


require __DIR__.'/auth.php';
