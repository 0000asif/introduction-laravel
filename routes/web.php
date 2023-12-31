<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
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

// Route::get('/', function () {
//      return view('index');
// });

Route::get('/', [productController::class, 'index'])->name('student.index');
Route::get('/create', [productController::class, 'create'])->name('student.create');
Route::post('/store', [productController::class, 'store'])->name('student.store');
Route::get('/edit/{id}', [productController::class, 'edit'])->name('student.edit');
Route::post('/update/{id}', [productController::class, 'update'])->name('student.update');
Route::get('/delete/{id}', [productController::class,'delete'])->name('student.delete');
