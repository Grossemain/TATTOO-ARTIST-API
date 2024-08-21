<?php

use App\Http\Controllers\API\ArtStyleController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\FlashTattooController;
use App\Http\Controllers\API\PictureController;
use App\Http\Controllers\API\PictureArtStyleController;
use App\Http\Controllers\API\UserArtStyleController;
use App\Http\Controllers\API\TattooShopController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });

// Accessible à tous

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Seulement accessible via le JWT
Route::middleware('auth:api')->group(function() {
Route::get('/currentuser', [UserController::class, 'currentUser']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/users', [AuthController::class, 'index'])->name('users.index');
Route::get('/users{user}', [AuthController::class, 'show'])->name('users.show');
});

//Routes vers User

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

//Routes vers Article

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{articles}', [ArticleController::class, 'show'])->name('articles.show');
Route::put('/articles/{articles}', [ArticleController::class, 'update'])->name('articles.update');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::delete('/articles/{articles}', [ArticleController::class, 'destroy'])->name('articles.destroy');

//Routes vers ArtStyle

Route::get('/artstyles', [ArtStyleController::class, 'index'])->name('artstyles.index');
Route::get('/artstyles/{artstyle}', [ArtStyleController::class, 'show'])->name('artstyles.show');
Route::put('/artstyles/{artstyle}', [ArtStyleController::class, 'update'])->name('artstyles.update');
Route::post('/artstyles', [ArtStyleController::class, 'store'])->name('artstyles.store');
Route::delete('/artstyles/{artstyle}', [ArtStyleController::class, 'destroy'])->name('artstyles.destroy');

//Routes vers FlashTattoo

Route::get('/flashtattoos', [FlashTattooController::class, 'index'])->name('flashtattoos.index');
Route::get('/flashtattoos/{flashtattoo}', [FlashTattooController::class, 'show'])->name('flashtattoos.show');
Route::put('/flashtattoos/{flashtattoo}', [FlashTattooController::class, 'update'])->name('flashtattoos.update');
Route::post('/flashtattoos', [FlashTattooController::class, 'store'])->name('flashtattoos.store');
Route::delete('/flashtattoos/{flashtattoo}', [FlashTattooController::class, 'destroy'])->name('flashtattoos.destroy');

//Routes vers Picture

Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::get('/pictures/{picture}', [PictureController::class, 'show'])->name('pictures.show');
Route::put('/pictures/{picture}', [PictureController::class, 'update'])->name('pictures.update');
Route::post('/pictures', [PictureController::class, 'store'])->name('pictures.store');
Route::delete('/pictures/{picture}', [PictureController::class, 'destroy'])->name('pictures.destroy');

//Routes vers PictureArtStyle

Route::get('/pictureartstyles', [PictureArtStyleController::class, 'index'])->name('pictureartstyles.index');
Route::get('/pictureartstyles/{pictureartstyle}', [PictureArtStyleController::class, 'show'])->name('pictureartstyles.show');
Route::put('/pictureartstyles/{pictureartstyle}', [PictureArtStyleController::class, 'update'])->name('pictureartstyles.update');
Route::post('/pictureartstyles', [PictureArtStyleController::class, 'store'])->name('pictureartstyles.store');
Route::delete('/pictureartstyles/{pictureartstyle}', [PictureArtStyleController::class, 'destroy'])->name('pictureartstyles.destroy');

//Routes vers UserStyle

Route::get('/userstyles', [UserArtStyleController::class, 'index'])->name('userstyles.index');
Route::get('/userstyles/{userstyle}', [UserArtStyleController::class, 'show'])->name('userstyles.show');
Route::put('/userstyles/{userstyle}', [UserArtStyleController::class, 'update'])->name('userstyles.update');
Route::post('/userstyles', [UserArtStyleController::class, 'store'])->name('userstyles.store');
Route::delete('/userstyles/{userstyle}', [UserArtStyleController::class, 'destroy'])->name('userstyles.destroy');

//Routes vers TattooShop

Route::get('/tattooshops', [TattooShopController::class, 'index'])->name('tattooshops.index');
Route::get('/tattooshops/{tattooshop}', [TattooShopController::class, 'show'])->name('tattooshops.show');
Route::put('/tattooshops/{tattooshop}', [TattooShopController::class, 'update'])->name('tattooshops.update');
Route::post('/tattooshops', [TattooShopController::class, 'store'])->name('tattooshops.store');
Route::delete('/tattooshops/{tattooshop}', [TattooShopController::class, 'destroy'])->name('tattooshops.destroy');