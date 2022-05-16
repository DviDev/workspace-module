<?php

namespace Modules\Workspace\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Workspace\Entities\WorkspaceEntityModel;
use Modules\Workspace\Http\Requests\WorkspaceStoreRequest;
use Modules\Workspace\Http\Requests\WorkspaceUpdateRequest;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkspaceStoreRequest $request)
    {
        $request->validate($this->rules());

        $user = auth()->user();

        $p = WorkspaceEntityModel::props();
        $parent = WorkspaceModel::query()->findOrFail($request->get($p->parent_id));
        return $p->new()
            ->set($p->user_id, $user->id)
            ->set($p->parent_id, $parent->id)
            ->set($p->name, $request->get($p->name))
            ->set($p->description, $request->get($p->description))
            ->save();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     */
    public function update(WorkspaceUpdateRequest $request)
    {
        return ($p = WorkspaceEntityModel::props())->new()
            ->set($p->user_id, auth()->user()->id)
            ->set($p->parent_id, $request->get($p->parent_id))
            ->set($p->name, $request->get($p->name))
            ->set($p->description, $request->get($p->description))
            ->save();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'int|required'
        ]);
        $model = (WorkspaceModel::query()->findOrFail($request->get('id')));
        return $model->delete();
    }

    protected function rules(): array
    {
        return [
            'parent_id' => 'int',
            'name' => 'string|required|min:2|max:200',
            'description' => 'string|max:200'
        ];
    }
}
