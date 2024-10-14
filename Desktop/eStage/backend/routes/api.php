<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\DemandesGuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/demandeCompte", [DemandesGuestController::class, "demandeCompte"]);

// Route::middleware(['auth:sanctum'])->post('/login', [AuthController::class, 'login']);
// Route::middleware(['auth:sanctum'])->post('/signup', [AuthController::class, 'signup']);
// Route::middleware(['auth:sanctum'])->post('/logout', [AuthController::class, 'logout']);