<?php

use App\Http\Controllers\FileController;
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

Route::post('member/folder/store', [FileController::class, "storeFolder"]);

Route::delete('member/folder/delete/{folder}', [FileController::class, "deleteFolder"]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
