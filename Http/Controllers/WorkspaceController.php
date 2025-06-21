<?php

namespace Modules\Workspace\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Http\Requests\WorkspaceUpdateRequest;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceController extends Controller
{
    public function show(WorkspaceModel $workspace)
    {
        return $workspace;
    }
    /**
     * Store a newly created resource in storage.
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function update(WorkspaceUpdateRequest $request, WorkspaceModel $workspace, WorkspaceEntityModel $p)
    {
        return ($p = $p::props())
            ->new()
            ->set($p->user_id, auth()->user()->id)
            ->set($p->parent_id, $request->get($p->parent_id))
            ->set($p->name, $request->get($p->name))
            ->set($p->description, $request->get($p->description))
            ->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'int|required',
        ]);
        $model = (WorkspaceModel::query()->findOrFail($request->get('id')));

        return $model->delete();
    }

    protected function rules(): array
    {
        return [
            'parent_id' => 'int',
            'name' => 'string|required|min:2|max:200',
            'description' => 'string|max:200',
        ];
    }
}
