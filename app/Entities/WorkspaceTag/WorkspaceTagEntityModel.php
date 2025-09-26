<?php

declare(strict_types=1);

namespace Modules\Workspace\Entities\WorkspaceTag;

use Modules\Base\Contracts\BaseEntityModel;
use Modules\Workspace\Models\WorkspaceTagModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspaceTagModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class WorkspaceTagEntityModel extends BaseEntityModel
{
    use WorkspaceTagProps;
}
