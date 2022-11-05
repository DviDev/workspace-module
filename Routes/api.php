<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Workspace\Http\Controllers\WorkspaceController;

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

Route::middleware('auth:api')->get('/workspace', function (Request $request) {
    return $request->user();
});
Route::prefix('workspace')->group(function () {
    Route::post('/create',  [WorkspaceController::class, 'store'])->name('workspace.store');
    Route::post('/update',  [WorkspaceController::class, 'update'])->name('workspace.update');
    Route::post('/delete',  [WorkspaceController::class, 'destroy'])->name('workspace.delete');
});
