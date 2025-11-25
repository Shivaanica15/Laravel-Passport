<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * =====================================
     *   CLIENTS PAGE + CLIENT CREATION
     * =====================================
     */

    // Show Clients Page
    Route::get('/dashboard/clients', function (Request $request) {
        return view('clients', [
            'clients' => $request->user()->clients,
        ]);
    })->name('dashboard.clients');

    // Create new OAuth client
    Route::post('/dashboard/clients/create', function (Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'redirect' => 'required|url',
        ]);

        $request->user()->clients()->create([
            'name' => $request->name,
            'redirect' => $request->redirect,
            'secret' => Str::random(40),
        ]);

        return back();
    })->name('dashboard.clients.create');
});

require __DIR__ . '/auth.php';
