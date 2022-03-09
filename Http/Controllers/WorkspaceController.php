<?php

namespace Modules\Workspace\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Workspace\Entities\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Repositories\WorkspaceRepository;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('workspace::index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        return ($p = WorkspaceEntityModel::props())->new()
            ->set($p->user_id, $request->get($p->user_id))
            ->set($p->parent_id, $request->get($p->parent_id))
            ->set($p->name, $request->get($p->name))
            ->set($p->description, $request->get($p->description))
            ->save();


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('workspace::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('workspace::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request)
    {
        $rules = $this->rules();
        $rules['id'] = 'int|required';
        $request->validate($rules);

        return ($p = WorkspaceEntityModel::props())->new()
            ->set($p->user_id, $request->get($p->user_id))
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
            'user_id' => 'int|required',
            'parent_id' => 'int',
            'name' => 'string|required|min:2|max:200',
            'description' => 'string|max:200'
        ];
    }
}
