<?php

namespace Modules\Workspace\Entities\WorkspaceParticipant;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Models\WorkspaceParticipantModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspaceParticipantModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class WorkspaceParticipantEntityModel extends BaseEntityModel
{
    use WorkspaceParticipantProps;
}
