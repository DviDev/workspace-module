<?php

namespace Modules\Workspace\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Workspace\Database\Factories\WorkspaceParticipantFactory;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read WorkspaceModel $workspace
 * @property-read User $participant
 * @method WorkspaceParticipantEntityModel toEntity()
 * @method static WorkspaceParticipantFactory factory()
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

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
