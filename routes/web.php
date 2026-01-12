<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController; // PENTING: Untuk fitur Admin
use App\Models\Article; // PENTING: Untuk halaman depan
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (LENGKAP)
|--------------------------------------------------------------------------
*/

// --- 1. HALAMAN DEPAN (PUBLIK) ---
// Ini yang memperbaiki error merah "$articles" tadi
Route::get('/', function () {
    $articles = Article::latest()->get(); 
    return view('welcome', compact('articles'));
});

// --- 2. DASHBOARD (REDIRECT) ---
Route::get('/dashboard', function () {
    return redirect()->route('articles.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- 3. FITUR ADMIN (HARUS LOGIN) ---
Route::middleware('auth')->group(function () {
    // Rute untuk manajemen artikel (CRUD)
    Route::resource('articles', ArticleController::class);
    
    // Rute profil bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- 4. RUTE AUTENTIKASI (LOGIN/REGISTER) ---
require __DIR__.'/auth.php';