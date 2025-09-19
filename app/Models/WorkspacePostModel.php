<?php

declare(strict_types=1);

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Post\Models\PostModel;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostEntityModel;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspaceModel $workspace
 * @property-read PostModel $post
 *
 * @method WorkspacePostEntityModel toEntity()
 */
final class WorkspacePostModel extends BaseModel
{
    use WorkspacePostProps;

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_posts', $alias);
    }

    public function modelEntity(): string
    {
        return WorkspacePostEntityModel::class;
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = WorkspacePostModel::class;
        };
    }
}
