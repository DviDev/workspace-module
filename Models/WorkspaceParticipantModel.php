<?php

namespace Modules\Workspace\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspaceModel $workspace
 * @property-read User $user
 *
 * @method WorkspaceParticipantEntityModel toEntity()
 */
class WorkspaceParticipantModel extends BaseModel
{
    use HasFactory;
    use WorkspaceParticipantProps;

    public function modelEntity(): string
    {
        return WorkspaceParticipantEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = WorkspaceParticipantModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_participants', $alias);
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
