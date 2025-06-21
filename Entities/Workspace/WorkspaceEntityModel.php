<?php

namespace Modules\Workspace\Entities\Workspace;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Repositories\WorkspaceRepository;

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
 * @method WorkspaceRepository repository()
 */
class WorkspaceEntityModel extends BaseEntityModel
{
    use WorkspaceProps;

    protected function repositoryClass(): string
    {
        return WorkspaceRepository::class;
    }
}
