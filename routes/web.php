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
// Route::get('/dist/assets/{any}', function ($any) {
//     $path = public_path("dist/assets/{$any}");

//     if (!file_exists($path)) {
//         abort(404);
//     }

//     $contentType = match (pathinfo($path, PATHINFO_EXTENSION)) {
//         'js' => 'application/javascript',
//         'css' => 'text/css',
//         'svg' => 'image/svg+xml',
//         'png' => 'image/png',
//         'jpg', 'jpeg' => 'image/jpeg',
//         'gif' => 'image/gif',
//         'woff' => 'font/woff',
//         'woff2' => 'font/woff2',
//         'ttf' => 'font/ttf',
//         'eot' => 'application/vnd.ms-fontobject',
//         default => 'text/plain',
//     };

//     return response()->file($path, ['Content-Type' => $contentType]);
// })->where('any', '.*');

// // Fallback route untuk SPA
// Route::fallback(function () {
//     return file_get_contents(public_path('dist/index.html'));
// });

use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| File ini berisi route Laravel yang diperlukan untuk mengakses file hasil
| build Next.js yang disimpan di dalam folder public/dist.
|
*/

// 🔹 Menyajikan file statis dari folder _next (Next.js assets)
// Route::get('/dist/_next/{path}', function ($path) {
//     $file = public_path("dist/_next/{$path}");

//     if (!file_exists($file)) {
//         abort(404);
//     }

//     $extension = pathinfo($file, PATHINFO_EXTENSION);

//     $contentType = match ($extension) {
//         'js' => 'application/javascript',
//         'css' => 'text/css',
//         'svg' => 'image/svg+xml',
//         'png' => 'image/png',
//         'jpg', 'jpeg' => 'image/jpeg',
//         'gif' => 'image/gif',
//         'woff' => 'font/woff',
//         'woff2' => 'font/woff2',
//         'ttf' => 'font/ttf',
//         'eot' => 'application/vnd.ms-fontobject',
//         default => 'application/octet-stream',
//     };

//     return Response::file($file, ['Content-Type' => $contentType]);
// })->where('path', '.*');

// // 🔹 Menyajikan file dari folder assets (jika kamu punya dist/assets/*)
// Route::get('/dist/assets/{path}', function ($path) {
//     $file = public_path("dist/assets/{$path}");

//     if (!file_exists($file)) {
//         abort(404);
//     }

//     $extension = pathinfo($file, PATHINFO_EXTENSION);

//     $contentType = match ($extension) {
//         'js' => 'application/javascript',
//         'css' => 'text/css',
//         'svg' => 'image/svg+xml',
//         'png' => 'image/png',
//         'jpg', 'jpeg' => 'image/jpeg',
//         'gif' => 'image/gif',
//         'woff' => 'font/woff',
//         'woff2' => 'font/woff2',
//         'ttf' => 'font/ttf',
//         'eot' => 'application/vnd.ms-fontobject',
//         default => 'application/octet-stream',
//     };

//     return Response::file($file, ['Content-Type' => $contentType]);
// })->where('path', '.*');

// // 🔹 Fallback ke index.html untuk semua route yang tidak dikenal (SPA routing)
// Route::get('/dist/{any}', function () {
//     return file_get_contents(public_path('dist/index.html'));
// })->where('any', '.*');

// // 🔹 Route Laravel biasa (jika kamu juga pakai halaman Laravel)
// Route::get('/', function () {
//     return view('welcome');
// });

// Menangani file statis Next.js
Route::get('/dist/{path}', function ($path) {
    $fullPath = public_path("dist/{$path}");

    if (!file_exists($fullPath)) {
        abort(404);
    }

    $extension = pathinfo($fullPath, PATHINFO_EXTENSION);

    $contentType = match ($extension) {
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
        'json' => 'application/json',
        default => 'application/octet-stream',
    };

    return Response::file($fullPath, ['Content-Type' => $contentType]);
})->where('path', '.*');

// Fallback untuk semua route ke dist/index.html (SPA)
Route::fallback(function () {
    return file_get_contents(public_path('dist/index.html'));
});
