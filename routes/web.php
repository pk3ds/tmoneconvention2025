<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome/Index', [
        'event' => [
            'card' => 'player',
            'title' => 'TM One Convention 2024',
            'image' => '/images/Banner-01.jpg',
            'description' => 'TM ONE Convention 2024',
        ]
    ]);
})->name('/');

Route::get('/info-pack', function () {
    return Inertia::render('Welcome/InfoPack', [
        'event' => [
            'card' => 'player',
            'title' => 'Info Pack',
            'image' => '/images/Banner-01.jpg',
            'description' => 'TM ONE Convention 2024 Info Pack',
        ]
    ]);
})->name('info-pack');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
