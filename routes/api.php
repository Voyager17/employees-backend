<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

Route::get('employees', [EmployeesController::class, 'all']);
Route::get('employees/{employee}', [EmployeesController::class, 'item']);
Route::post('employees', [EmployeesController::class, 'create']);
Route::put('employees/{employee}', [EmployeesController::class, 'update']);
Route::delete('employees/{employee}', [EmployeesController::class, 'delete']);

Route::get('companies/', [CompaniesController::class, 'all']);
Route::get('companies/{company}', [CompaniesController::class, 'item']);
Route::post('companies/', [CompaniesController::class, 'create']);
Route::put('companies/{company}', [CompaniesController::class, 'update']);
Route::delete('companies/{company}', [CompaniesController::class, 'delete']);
