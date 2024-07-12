<?php

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

Route::prefix('customers')->as('customers.')->controller(\App\Http\Controllers\Api\Auth\CustomerController::class)->group(function() {
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('show/{id}', 'show')->name('show');
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::any('update/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
});

Route::prefix('leads')->as('leads.')->controller(\App\Http\Controllers\Api\LeadController::class)->group(function() {
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('show/{id}', 'show')->name('show');
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::any('update/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
});
