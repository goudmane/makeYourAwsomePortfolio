<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\PortfolioLangController;
use App\Http\Controllers\Api\Sections\AboutController;
use App\Http\Controllers\Api\Sections\ContactController;
use App\Http\Controllers\Api\Sections\HeroController;
use App\Http\Controllers\Api\Sections\JobController;
use App\Http\Controllers\Api\Sections\ProjectController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('portfolios', PortfolioController::class);
    
    Route::post('portfolios/{portfolio}/languages', [PortfolioLangController::class, 'store']);
    Route::put('portfolios/{portfolio}/languages/{lang}', [PortfolioLangController::class, 'update']);
    Route::delete('portfolios/{portfolio}/languages/{lang}', [PortfolioLangController::class, 'destroy']);
    
    // Section routes
    Route::prefix('languages/{lang}')->group(function () {
        // Hero section
        Route::post('/hero', [HeroController::class, 'store']);
        Route::put('/hero/{hero}', [HeroController::class, 'update']);
        Route::delete('/hero/{hero}', [HeroController::class, 'destroy']);
        
        // About section
        Route::post('/about', [AboutController::class, 'store']);
        Route::put('/about/{about}', [AboutController::class, 'update']);
        Route::delete('/about/{about}', [AboutController::class, 'destroy']);
        
        // Job sections
        Route::post('/jobs', [JobController::class, 'store']);
        Route::put('/jobs/{job}', [JobController::class, 'update']);
        Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
        
        // Project sections
        Route::post('/projects', [ProjectController::class, 'store']);
        Route::put('/projects/{project}', [ProjectController::class, 'update']);
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);
        
        // Contact section
        Route::post('/contact', [ContactController::class, 'store']);
        Route::put('/contact/{contact}', [ContactController::class, 'update']);
        Route::delete('/contact/{contact}', [ContactController::class, 'destroy']);
    });
    
    Route::post('/logout', [AuthController::class, 'logout']);
});