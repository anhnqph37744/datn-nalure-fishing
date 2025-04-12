<?php

use App\Http\Controllers\AI\GeminiAIController;
use App\Http\Controllers\client\chat\ChatBotController;
use App\Http\Controllers\VNPay\VNPayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/chat', [GeminiAIController::class, 'chat']);

Route::post('/vnpay',[VNPayController::class,'VNpay_Payment']);
