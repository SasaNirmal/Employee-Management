<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

// routes/web.php
Route::get('/', function () {
    return view('welcome');
});

Route::get('employees', [EmployeeController::class, 'index'])->name('employee.list');
Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.save');
Route::get('employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::get('employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::delete('employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
