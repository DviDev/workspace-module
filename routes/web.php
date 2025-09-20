<?php

declare(strict_types=1);

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

use Illuminate\Support\Facades\Route;
use Modules\Project\Services\DynamicRoutes;
use Modules\Workspace\Models\WorkspaceModel;

DynamicRoutes::all('Workspace');

Route::middleware(['auth', 'verified'])
    ->prefix('workspace')->group(function (): void {
        Route::get('/list', fn () => view('workspace::components.page.workspaces'))->name('admin.workspace.list');

        Route::get('/form/{workspace?}', fn (?WorkspaceModel $workspace) => view('workspace::components.page.workspace_edit', compact('workspace')))
            ->name('workspace.form');

    });
