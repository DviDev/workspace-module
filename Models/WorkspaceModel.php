<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Workspace\Database\factories\WorkspaceFactory;
use Modules\Workspace\Entities\WorkspaceEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method WorkspaceEntityModel toEntity()
 */
class WorkspaceModel extends BaseModel
{
    use HasFactory;

    function modelEntity()
    {
        return WorkspaceEntityModel::class;
    }

    protected static function newFactory()
    {
        return new WorkspaceFactory();
    }
}
