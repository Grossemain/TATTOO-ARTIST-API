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
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

//Routes vers ArtStyle

Route::get('/artstyles', [ArtStyleController::class, 'index'])->name('artstyles.index');
Route::get('/artstyles/{artStyle}', [ArtStyleController::class, 'show'])->name('artstyles.show');
Route::put('/artstyles/{artStyle}', [ArtStyleController::class, 'update'])->name('artstyles.update');
Route::post('/artstyles', [ArtStyleController::class, 'store'])->name('artstyles.store');
Route::delete('/artstyles/{artStyle}', [ArtStyleController::class, 'destroy'])->name('artstyles.destroy');

//Routes vers FlashTattoo

Route::get('/flashtattoos', [FlashTattooController::class, 'index'])->name('flashtattoos.index');
Route::get('/flashtattoos/{flashTattoo}', [FlashTattooController::class, 'show'])->name('flashtattoos.show');
Route::put('/flashtattoos/{flashTattoo}', [FlashTattooController::class, 'update'])->name('flashtattoos.update');
Route::post('/flashtattoos', [FlashTattooController::class, 'store'])->name('flashtattoos.store');
Route::delete('/flashtattoos/{flashTattoo}', [FlashTattooController::class, 'destroy'])->name('flashtattoos.destroy');

//Routes vers Picture

Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::get('/pictures/{picture}', [PictureController::class, 'show'])->name('pictures.show');
Route::put('/pictures/{picture}', [PictureController::class, 'update'])->name('pictures.update');
Route::post('/pictures', [PictureController::class, 'store'])->name('pictures.store');
Route::delete('/pictures/{picture}', [PictureController::class, 'destroy'])->name('pictures.destroy');

//Routes vers PictureArtStyle

Route::get('/pictureartstyles', [PictureArtStyleController::class, 'index'])->name('pictureartstyles.index');
Route::get('/pictureartstyles/{pictureArtStyle}', [PictureArtStyleController::class, 'show'])->name('pictureartstyles.show');
Route::put('/pictureartstyles/{pictureArtStyle}', [PictureArtStyleController::class, 'update'])->name('pictureartstyles.update');
Route::post('/pictureartstyles', [PictureArtStyleController::class, 'store'])->name('pictureartstyles.store');
Route::delete('/pictureartstyles/{pictureArtStyle}', [PictureArtStyleController::class, 'destroy'])->name('pictureartstyles.destroy');

//Routes vers UserStyle

Route::get('/userstyles', [UserArtStyleController::class, 'index'])->name('userstyles.index');
Route::get('/userstyles/{userStyle}', [UserArtStyleController::class, 'show'])->name('userstyles.show');
Route::put('/userstyles/{userStyle}', [UserArtStyleController::class, 'update'])->name('userstyles.update');
Route::post('/userstyles', [UserArtStyleController::class, 'store'])->name('userstyles.store');
Route::delete('/userstyles/{userStyle}', [UserArtStyleController::class, 'destroy'])->name('userstyles.destroy');

//Routes vers TattooShop

Route::get('/tattooshops', [TattooShopController::class, 'index'])->name('tattooshops.index');
Route::get('/tattooshops/{tattooShop}', [TattooShopController::class, 'show'])->name('tattooshops.show');
Route::put('/tattooshops/{tattooShop}', [TattooShopController::class, 'update'])->name('tattooshops.update');
Route::post('/tattooshops', [TattooShopController::class, 'store'])->name('tattooshops.store');
Route::delete('/tattooshops/{tattooShop}', [TattooShopController::class, 'destroy'])->name('tattooshops.destroy');