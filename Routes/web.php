<?php

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
use Modules\Workspace\Models\WorkspaceModel;

Route::middleware(['auth', 'verified'])->prefix('workspace')->group(function () {
    Route::view('/workspace/list', 'workspace::components.page.workspaces')->name('admin.workspaces');
    Route::get('/form/{workspace?}', fn(?WorkspaceModel $workspace) => view('workspace::components.page.workspace_edit', compact('workspace')))
        ->name('workspace.form');
    Route::get('/{workspace}/chats', fn(WorkspaceModel $workspace) => view('workspace::components.page.workspace_chats_page', compact('workspace')))
        ->name('admin.workspace.chats');
    Route::get('/{workspace}/links', fn(WorkspaceModel $workspace) =>
        view('workspace::components.page.workspace_links_page', compact('workspace')))
            ->name('admin.workspace.links');
    Route::get('/{workspace}/participants', fn(WorkspaceModel $workspace) =>
        view('workspace::components.page.workspace_participants_page', compact('workspace')))
            ->name('admin.workspace.participants');
    Route::get('/{workspace}/posts', fn(WorkspaceModel $workspace) =>
        view('workspace::components.page.workspace_posts_page', compact('workspace')))
        ->name('admin.workspace.posts');
    Route::get('/{workspace}/projects', fn(WorkspaceModel $workspace) =>
        view('workspace::components.page.workspace_projects_page', compact('workspace')))
            ->name('admin.workspace.projects');
    Route::get('/{workspace}/tags', fn(WorkspaceModel $workspace) =>
        view('workspace::components.page.workspace_tags_page', compact('workspace')))
            ->name('admin.workspace.tags');
});
