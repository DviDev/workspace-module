<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Workspace\Database\Factories\WorkspaceParticipantFactory;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method WorkspaceParticipantEntityModel toEntity()
 * @method WorkspaceParticipantFactory factory()
 */
class WorkspaceParticipantModel extends BaseModel
{
    use HasFactory;
    use WorkspaceParticipantProps;

    public function modelEntity(): string
    {
        return WorkspaceParticipantEntityModel::class;
    }

    protected static function newFactory(): WorkspaceParticipantFactory
    {
        return new WorkspaceParticipantFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_participants', $alias);
    }
}
