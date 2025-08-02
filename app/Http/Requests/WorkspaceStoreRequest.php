<?php

namespace Modules\Workspace\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $p = WorkspaceEntityModel::props('workspace', true);

        return [
            $p->parent_id => ['nullable', 'exists:'.WorkspaceModel::table().',id'],
            $p->name => ['string', 'required', 'min:2', 'max:100'],
            $p->description => 'max:200',
        ];
    }

    public function authorize(): bool
    {
        if (auth()->user()) {
            return true;
        }

        return false;
    }
}
