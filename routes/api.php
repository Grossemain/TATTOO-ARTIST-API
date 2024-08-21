<?php

use App\Http\Controllers\API\ArtStyleController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });
    Route::apiResource("ArtStyles", ArtStyleController::class);