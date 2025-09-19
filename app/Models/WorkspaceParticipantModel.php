<?php

declare(strict_types=1);

namespace Modules\Workspace\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
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
final class WorkspaceParticipantModel extends BaseModel
{
    use WorkspaceParticipantProps;

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_participants', $alias);
    }

    public function modelEntity(): string
    {
        return WorkspaceParticipantEntityModel::class;
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = WorkspaceParticipantModel::class;
        };
    }
}
