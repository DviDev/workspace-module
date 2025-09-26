<?php

declare(strict_types=1);

namespace Modules\Workspace\Entities\WorkspaceParticipant;

use Modules\Base\Contracts\BaseEntityModel;
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
final class WorkspaceParticipantEntityModel extends BaseEntityModel
{
    use WorkspaceParticipantProps;
}
