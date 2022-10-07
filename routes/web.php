<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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


Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

   // Company panel
Route::get('/company/add', [CompanyController::class, 'add'])->name('company.add');
Route::post('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::get('/company/manage', [CompanyController::class, 'manage'])->name('company.manage');
Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
Route::post('/company/update/{id}', [CompanyController::class, 'update'])->name('company.update');
Route::get('/company/delete/{id}', [CompanyController::class, 'delete'])->name('company.delete');

   //Employee panel
Route::get('/employee/add', [EmployeeController::class, 'index'])->name('employee.add');
Route::post('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::get('/employee/manage', [EmployeeController::class, 'manage'])->name('employee.manage');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');


