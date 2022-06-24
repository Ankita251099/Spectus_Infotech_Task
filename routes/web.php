<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('company',[App\Http\Controllers\CompanyController::class,'index'])->name('company');
Route::get('company/create',[App\Http\Controllers\CompanyController::class,'create'])->name('company.create');
Route::post('company/add',[App\Http\Controllers\CompanyController::class,'store'])->name('company.add');
Route::get('company/edit/{id}',[App\Http\Controllers\CompanyController::class,'edit'])->name('company.edit');
Route::get('getstate', [App\Http\Controllers\CompanyController::class, 'getstate'])->name('getstate');
Route::post('company/update/{id}',[App\Http\Controllers\CompanyController::class,'update'])->name('company.update');
Route::post('company/delete',[App\Http\Controllers\CompanyController::class,'destroy'])->name('company.delete');




Route::get('employe',[App\Http\Controllers\EmployeController::class,'index'])->name('employe');
Route::get('employe/create',[App\Http\Controllers\EmployeController::class,'create'])->name('employe.create');
Route::post('employe/add',[App\Http\Controllers\EmployeController::class,'store'])->name('employe.add');
Route::get('employe/edit/{id}',[App\Http\Controllers\EmployeController::class,'edit'])->name('employe.edit');
Route::post('employe/update/{id}',[App\Http\Controllers\EmployeController::class,'update'])->name('employe.update');
Route::post('employe/delete',[App\Http\Controllers\EmployeController::class,'destroy'])->name('employe.delete');
Route::get('searchcompany',[App\Http\Controllers\EmployeController::class,'searchcompany'])->name('searchcompany');

