<?php

namespace Modules\Workspace\Entities\WorkspaceLink;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Repositories\WorkspaceLinkRepository;
use Modules\Workspace\Models\WorkspaceLinkModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read WorkspaceLinkModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method WorkspaceLinkRepository repository()
 */
class WorkspaceLinkEntityModel extends BaseEntityModel
{
    use WorkspaceLinkProps;

    protected function repositoryClass(): string
    {
        return WorkspaceLinkRepository::class;
    }
}
