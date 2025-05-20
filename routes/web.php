<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Pastikan assets dapat diakses
Route::get('/dist/assets/{any}', function ($any) {
    $path = public_path("dist/assets/{$any}");

    if (!file_exists($path)) {
        abort(404);
    }

    $contentType = match (pathinfo($path, PATHINFO_EXTENSION)) {
        'js' => 'application/javascript',
        'css' => 'text/css',
        'svg' => 'image/svg+xml',
        'png' => 'image/png',
        'jpg', 'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf' => 'font/ttf',
        'eot' => 'application/vnd.ms-fontobject',
        default => 'text/plain',
    };

    return response()->file($path, ['Content-Type' => $contentType]);
})->where('any', '.*');

// Fallback route untuk SPA
Route::fallback(function () {
    return file_get_contents(public_path('dist/index.html'));
});
