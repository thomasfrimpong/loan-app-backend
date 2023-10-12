<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post("/register/customer", [LoanController::class, 'registerCustomer']);

    Route::post("/add/loan", [LoanController::class, 'addLoan']);

    Route::get("/get/loans", [LoanController::class, 'getLoans']);

    Route::get("/customer/list", [LoanController::class, 'customerList']);
});


Route::post("/add/admin", [AdminController::class, 'addAdmin']);

Route::post("/login/admin", [AdminController::class, 'loginAdmin']);
