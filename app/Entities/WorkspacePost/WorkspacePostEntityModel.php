<?php

declare(strict_types=1);

namespace Modules\Workspace\Entities\WorkspacePost;

use Modules\Base\Contracts\BaseEntityModel;
use Modules\Workspace\Models\WorkspacePostModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspacePostModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class WorkspacePostEntityModel extends BaseEntityModel
{
    use WorkspacePostProps;
}
