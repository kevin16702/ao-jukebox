<?php

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');

Route::get('/playlist', [App\Http\Controllers\PlaylistController::class, 'index'])->middleware(['auth'])->name('playlist');

Route::get('/playlist/{songId}', [App\Http\Controllers\PlaylistController::class, 'delete'])->name('deleteSongFromPlaylist');

Route::get('/genre', [App\Http\Controllers\GenreController::class, 'index'])->middleware(['auth'])->name('genre');

Route::get('/category/{genreId}', [App\Http\Controllers\GenreController::class, 'filter'])->middleware(['auth'])->name('songOverview');

Route::get('/songOverview/{genreId}/{songId}', [App\Http\Controllers\PlaylistController::class, 'push'])->name('addSongToPlaylist');

Route::post('/playlistOverview', [App\Http\Controllers\PlaylistController::class, 'saveToUser'])->middleware(['auth'])->name('savePlaylistToUser');

Route::get('/playlistOverview', [App\Http\Controllers\playlistOverviewController::class, 'index'])->middleware(['auth'])->name('playlistOverview');

Route::post('/playlistOverview/edit', [App\Http\Controllers\playlistOverviewController::class, 'edit'])->middleware(['auth'])->name('editPlaylist');

Route::get('/playlistOverview/delete/{id}', [App\Http\Controllers\playlistOverviewController::class, 'delete'])->middleware(['auth'])->name('deletePlaylist');

Route::get('/playlistOverview/songdelete/{songId}', [App\Http\Controllers\playlistOverviewController::class, 'deleteSong'])->middleware(['auth'])->name('deleteSong');

Route::post('/genre/{genreId}/save', [App\Http\Controllers\playlistOverviewController::class, 'saveToPlaylist'])->middleware(['auth'])->name('saveToPlaylist');