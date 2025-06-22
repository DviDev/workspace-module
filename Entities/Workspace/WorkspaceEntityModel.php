<?php

namespace Modules\Workspace\Entities\Workspace;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspaceModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class WorkspaceEntityModel extends BaseEntityModel
{
    use WorkspaceProps;
}
