<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SurveyController;
use App\Http\Controllers\Api\AuthController1;
// C:\Users\baboo.mehandro\Desktop\Survey_app\survey_app\app\Http\Controllers\Api\AuthController.php

Route::controller(AuthController1::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register', 'register');
});


Route::middleware(['auth:sanctum', 'admin.redirect'])->group(function () {
    // Dashboard route(s) here
    Route::get('/dashboard', function () {
        // Dashboard logic
    })->name('dashboard');
});

Route::middleware('auth:sanctum')->get('/user', [AuthController1::class, 'user']);
Route::middleware('auth:sanctum')->post('logout', [AuthController1::class, 'logout']);


// RedirectBasedOnRole


Route::get('surveys', [SurveyController::class, 'index']);
Route::POST('surveys', [SurveyController::class, 'store']);
Route::get('surveys/{id}', [SurveyController::class, 'show']);
Route::put('surveys/{id}', [SurveyController::class, 'update']);
Route::delete('surveys/{id}', [SurveyController::class, 'destroy']);
