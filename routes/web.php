<?php

use App\Http\Controllers\AccountLedgerController;
use App\Http\Controllers\ChartOfAccountsController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::resource('todos', TodoController::class);
Route::resource('chart_of_accounts', ChartOfAccountsController::class);
Route::resource('account_ledgers', AccountLedgerController::class);
Route::resource('product_types', ProductTypeController::class);
