<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Post\Models\PostModel;
use Modules\Workspace\Database\Factories\WorkspacePostFactory;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostEntityModel;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read WorkspaceModel $workspace
 * @property-read PostModel $post
 * @method WorkspacePostEntityModel toEntity()
 * @method static WorkspacePostFactory factory()
 */
class WorkspacePostModel extends BaseModel
{
    use HasFactory;
    use WorkspacePostProps;

    public function modelEntity(): string
    {
        return WorkspacePostEntityModel::class;
    }

    protected static function newFactory(): WorkspacePostFactory
    {
        return new WorkspacePostFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_posts', $alias);
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }
}