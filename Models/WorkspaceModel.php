<?php

namespace Modules\Workspace\Models;

use Modules\Base\Models\BaseModel;
use Modules\Workspace\Entities\WorkspaceEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method WorkspaceEntityModel toEntity()
 */
class WorkspaceModel extends BaseModel
{
    function modelEntity()
    {
        return WorkspaceEntityModel::class;
    }
}
