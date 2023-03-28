<?php

use App\Http\Controllers\internController;
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

Route::get('/interns',[internController::class,'index'])->name('interns.index');
Route::get('/interns/create',[internController::class,'create'])->name('interns.create');
Route::post('/interns',[internController::class,'store'])->name('interns.store');
Route::get('/interns/{intern}/edit',[internController::class,'edit'])->name('interns.edit');
Route::put('/interns/{intern}',[internController::class,'update'])->name('interns.update');
Route::delete('/interns/{intern}',[internController::class,'destroy'])->name('interns.destroy');