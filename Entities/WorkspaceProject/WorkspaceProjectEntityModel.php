<?php

namespace Modules\Workspace\Entities\WorkspaceProject;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Models\WorkspaceProjectModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspaceProjectModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class WorkspaceProjectEntityModel extends BaseEntityModel
{
    use WorkspaceProjectProps;
}
