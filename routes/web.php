<?php

use App\Http\Controllers\Patient\DashboardController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

    Route::middleware(['auth', 'user-access:patient'])->prefix('patient')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('patient.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

});
