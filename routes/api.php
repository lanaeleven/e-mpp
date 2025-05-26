<?php

use App\Http\Controllers\API\AuthController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);

    // Route::post('/logout', function (Request $request) {
    //     // Revoke token yang digunakan saat ini
    //     $request->user()->currentAccessToken()->delete();
    //     return response()->json(['message' => 'Berhasil logout']);
    // });

    Route::post('/logout', function (Request $request) {
        // Revoke token yang digunakan saat ini, jika ada
        $token = $request->user()->currentAccessToken();
        if ($token) {
            $token->delete();
        }
        return response()->json(['message' => 'Berhasil logout']);
    });
});
