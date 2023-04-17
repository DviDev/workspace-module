<?php

namespace Modules\Workspace\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Models\ChatModel;
use Modules\Link\Models\LinkModel;
use Modules\Post\Models\PostModel;
use Modules\Project\Models\ProjectModel;
use Modules\Social\Models\SocialGroupModel;
use Modules\Social\Models\SocialPageModel;
use Modules\Task\Models\TaskBoardModel;
use Modules\Workspace\Database\Factories\WorkspaceFactory;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Entities\Workspace\WorkspaceProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read User $user
 * @property-read User[]|Collection $participants
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

    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(ChatModel::class, WorkspaceChatModel::class, 'workspace_id', 'chat_id');
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(PostModel::class, WorkspacePostModel::class, 'post_id', 'workspace_id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(ProjectModel::class, WorkspaceProjectModel::class, 'project_id', 'workspace_id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(WorkspaceTagModel::class, 'workspace_id');
    }

    public function groups(): HasMany
    {
        return $this->hasMany(SocialGroupModel::class, 'workspace_id');
    }

    public function pages(): HasMany
    {
        return $this->hasMany(SocialPageModel::class, 'workspace_id');
    }

    public function taskBoards(): HasMany
    {
        return $this->hasMany(TaskBoardModel::class, 'workspace_id');
    }
}
