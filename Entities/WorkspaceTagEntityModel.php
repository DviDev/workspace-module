<?php

namespace Modules\Workspace\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Repositories\WorkspaceTagRepository;
use Modules\Workspace\Models\WorkspaceTagModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $workspace_id
 * @property $created_by_user_id
 * @property $name
 * @property $created_at
 * @property-read WorkspaceTagModel $model
 * @method static self props($alias = null, $force = null)
 * @method WorkspaceTagRepository repository()
 */
class WorkspaceTagEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return WorkspaceTagRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('workspace_tags', $alias);
    }
}

