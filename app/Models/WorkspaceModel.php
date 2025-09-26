<?php

declare(strict_types=1);

namespace Modules\Workspace\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\BaseFactory;
use Modules\Builder\Contracts\QueryableByBuilder;
use Modules\Chat\Models\ChatModel;
use Modules\Link\Models\LinkModel;
use Modules\Person\Models\Relations\BelongsToUser;
use Modules\Post\Models\PostModel;
use Modules\Project\Models\ProjectModel;
use Modules\Social\Models\SocialGroupModel;
use Modules\Social\Models\SocialPageModel;
use Modules\Task\Models\TaskBoardModel;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Entities\Workspace\WorkspaceProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read User $user
 * @property-read User[]|Collection $participants
 * @property-read LinkModel[] $links
 *
 * @method WorkspaceEntityModel toEntity()
 */
final class WorkspaceModel extends BaseModel implements QueryableByBuilder
{
    use BelongsToUser;
    use SoftDeletes;
    use WorkspaceProps;

    protected $with = ['user'];

    public static function table($alias = null): string
    {
        return self::dbTable('workspaces', $alias);
    }

    public function modelEntity(): string
    {
        return WorkspaceEntityModel::class;
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
        return $this->belongsToMany(LinkModel::class, WorkspaceLinkModel::class, 'workspace_id', 'link_id');
    }

    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(ChatModel::class, WorkspaceChatModel::class, 'workspace_id', 'chat_id');
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(PostModel::class, WorkspacePostModel::class, 'workspace_id', 'post_id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(ProjectModel::class, WorkspaceProjectModel::class, 'workspace_id', 'project_id');
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

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = WorkspaceModel::class;

            protected function callAfterCreating(Collection $instances, ?Model $parent = null): void
            {
                $instances->each(function (WorkspaceModel $model): void {
                    $model->participants()->sync($model->user_id);
                });
                parent::callAfterCreating($instances, $parent);
            }
        };
    }

    public static function getAllowedBuilderFields(): array
    {
        $p = WorkspaceEntityModel::props();
        return [
            $p->name,
            $p->description,
        ];
    }
}
