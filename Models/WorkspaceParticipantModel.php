<?php

namespace Modules\Workspace\Models;

use Modules\Base\Models\BaseModel;
use Modules\Workspace\Entities\WorkspaceParticipantEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method WorkspaceParticipantEntityModel toEntity()
 */
class WorkspaceParticipantModel extends BaseModel
{
    function modelEntity()
    {
        return WorkspaceParticipantEntityModel::class;
    }
}
