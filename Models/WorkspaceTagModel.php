<?php

namespace Modules\Workspace\Models;

use Modules\Base\Models\BaseModel;
use Modules\Workspace\Entities\WorkspaceTagEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method WorkspaceTagEntityModel toEntity()
 */
class WorkspaceTagModel extends BaseModel
{
    function modelEntity()
    {
        return WorkspaceTagEntityModel::class;
    }
}
