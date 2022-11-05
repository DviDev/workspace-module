<?php

namespace Modules\Workspace\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Repositories\WorkspaceRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $user_id
 * @property $parent_id
 * @property $name
 * @property $description
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method WorkspaceRepository repository()
 */
class WorkspaceEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return WorkspaceRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('workspaces', $alias);
    }
}

