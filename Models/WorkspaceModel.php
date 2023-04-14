<?php

namespace Modules\Workspace\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Base\Models\BaseModel;
use Modules\Link\Models\LinkModel;
use Modules\Workspace\Database\Factories\WorkspaceFactory;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Entities\Workspace\WorkspaceProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read User $user
 * @property-read User[] $participants
 * @property-read LinkModel[] $links
 * @method WorkspaceEntityModel toEntity()
 * @method static WorkspaceFactory factory()
 */
class WorkspaceModel extends BaseModel
{
    use HasFactory;
    use WorkspaceProps;

    public function modelEntity(): string
    {
        return WorkspaceEntityModel::class;
    }

    protected static function newFactory(): WorkspaceFactory
    {
        return new WorkspaceFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspaces', $alias);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            WorkspaceParticipantModel::class,
            'workspace_id',
            'user_id'
        );
    }

    public function links(): BelongsToMany
    {
        return $this->belongsToMany(LinkModel::class, WorkspaceLinkModel::class, 'link_id', 'workspace_id');
    }
}
