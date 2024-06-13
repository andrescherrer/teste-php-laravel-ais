<?php

use App\Http\Controllers\ImportJsonFile;
use App\Http\Controllers\SendDocumentQueue;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('document')->group(function () {
    Route::get('/', function () { return view('document.index'); });
    Route::get('/confirm', function () { return view('document.start-queue'); });
    Route::post('/import', ImportJsonFile::class)->name('document.import');
    Route::get('/send', SendDocumentQueue::class)->name('document.send');
    Route::get('/sent', function () { return view('document.sent'); });
});