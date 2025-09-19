<?php

declare(strict_types=1);

namespace Modules\Workspace\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Workspace\Models\WorkspaceModel;

final class WorkspaceUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'int|required',
            'parent_id' => 'int',
            'name' => 'string|required|min:2|max:200',
            'description' => 'string|max:200',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return WorkspaceModel::query()->where([
            'id' => $this->request->get('id'),
            'user_id' => $this->user()->id,
        ])->exists();
    }
}
