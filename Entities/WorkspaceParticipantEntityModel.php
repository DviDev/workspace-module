<?php

namespace Modules\Workspace\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Repositories\WorkspaceParticipantRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $workspace_id
 * @property $user_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method WorkspaceParticipantRepository repository()
 */
class WorkspaceParticipantEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return WorkspaceParticipantRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('workspace_participants', $alias);
    }
}

