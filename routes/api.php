<?php

use App\Http\Controllers\Api\GbrController;
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
Route::namespace('Api')->group(function (){
    Route::get('get-groups', [GbrController::class, 'getGroups']);
    Route::post('add-group', [GbrController::class, 'addGroup']);
    Route::post('edit-group', [GbrController::class, 'editGroup']);
    Route::delete('delete-group', [GbrController::class, 'deleteGroup']);
});
