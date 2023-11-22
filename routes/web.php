<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/crud', [CrudController::class, 'index'])->middleware(['auth'])->name('crud');
Route::post('/add-crud', [CrudController::class, 'store'])->middleware(['auth']);
Route::post('/destroy-crud/{id}', [CrudController::class, 'destroy'])->middleware(['auth']);

// Route::resource('crud', CrudController::class);

require __DIR__ . '/auth.php';
