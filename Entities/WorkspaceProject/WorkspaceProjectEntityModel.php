<?php

namespace Modules\Workspace\Entities\WorkspaceProject;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Repositories\WorkspaceProjectRepository;
use Modules\Workspace\Models\WorkspaceProjectModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read WorkspaceProjectModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method WorkspaceProjectRepository repository()
 */
class WorkspaceProjectEntityModel extends BaseEntityModel
{
    use WorkspaceProjectProps;

    protected function repositoryClass(): string
    {
        return WorkspaceProjectRepository::class;
    }
}
