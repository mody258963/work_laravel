<?php
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AlbumController::class, 'index'])->name('albums.index');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');
Route::post('/albums/{album}/pictures', [PictureController::class, 'addPicture'])->name('albums.addPicture');
Route::delete('/pictures/{picture}', [PictureController::class, 'destroy'])->name('pictures.destroy');