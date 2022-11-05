<?php

namespace Modules\Workspace\Entities\WorkspaceTag;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Repositories\WorkspaceTagRepository;
use Modules\Workspace\Models\WorkspaceTagModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read WorkspaceTagModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method WorkspaceTagRepository repository()
 */
class WorkspaceTagEntityModel extends BaseEntityModel
{
    use WorkspaceTagProps;

    protected function repositoryClass(): string
    {
        return WorkspaceTagRepository::class;
    }
}
