<?php

declare(strict_types=1);

namespace Modules\Workspace\Entities\WorkspaceLink;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Models\WorkspaceLinkModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspaceLinkModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class WorkspaceLinkEntityModel extends BaseEntityModel
{
    use WorkspaceLinkProps;
}
