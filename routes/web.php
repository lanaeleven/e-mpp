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
use App\Http\Controllers\UserController;

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

// // Menangani file statis Next.js
// Route::get('/dist/{path}', function ($path) {
//     $fullPath = public_path("dist/{$path}");

//     if (!file_exists($fullPath)) {
//         abort(404);
//     }

//     $extension = pathinfo($fullPath, PATHINFO_EXTENSION);

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
//         'json' => 'application/json',
//         default => 'application/octet-stream',
//     };

//     return Response::file($fullPath, ['Content-Type' => $contentType]);
// })->where('path', '.*');

// // Fallback untuk semua route ke dist/index.html (SPA)
// Route::fallback(function () {
//     return file_get_contents(public_path('dist/index.html'));
// });

// Route khusus untuk root (homepage)
Route::get('/', function () {
    return file_get_contents(public_path('index.html'));
});

Route::get('/login', function () {
    return file_get_contents(public_path('login/index.html'));
});

Route::get('/pedoman', function () {
    return file_get_contents(public_path('pedoman/index.html'));
});

Route::get('/tutorial', function () {
    return file_get_contents(public_path('tutorial/index.html'));
});

Route::get('/menus/oncall/', function () {
    return file_get_contents(public_path('menus/oncall/index.html'));
});

Route::get('/primaryMenus/slrs/', function () {
    return file_get_contents(public_path('primaryMenus/slrs/index.html'));
});

Route::get('/menus/irj/', function () {
    return file_get_contents(public_path('menus/irj/index.html'));
});

Route::get('/menus/igd/', function () {
    return file_get_contents(public_path('menus/igd/index.html'));
});

Route::get('/menus/rwi/', function () {
    return file_get_contents(public_path('menus/rwi/index.html'));
});

Route::get('/menus/ibs/', function () {
    return file_get_contents(public_path('menus/ibs/index.html'));
});

Route::get('/menus/hd/', function () {
    return file_get_contents(public_path('menus/hd/index.html'));
});

Route::get('/menus/tppri/', function () {
    return file_get_contents(public_path('menus/tppri/index.html'));
});

Route::get('/primaryMenus/ssdm/', function () {
    return file_get_contents(public_path('primaryMenus/ssdm/index.html'));
});

Route::get('/primaryMenus/ssarpras/', function () {
    return file_get_contents(public_path('primaryMenus/ssarpras/index.html'));
});

Route::get('/primaryMenus/sbilling/', function () {
    return file_get_contents(public_path('primaryMenus/sbilling/index.html'));
});

Route::get('/primaryMenus/kepuasan/', function () {
    return file_get_contents(public_path('primaryMenus/kepuasan/index.html'));
});

Route::get('/primaryMenus/lainnya/', function () {
    return file_get_contents(public_path('primaryMenus/lainnya/index.html'));
});

// Route resource untuk UserController, path diganti string random
Route::resource('mppuser-7f3a2b', UserController::class);




// Menangani file statis Next.js langsung dari public/
Route::get('/{path}', function ($path) {
    $fullPath = public_path($path);

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

// Fallback untuk semua route ke index.html (SPA)
Route::fallback(function () {
    return file_get_contents(public_path('index.html'));
});
