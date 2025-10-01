<?php

declare(strict_types=1);

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseFactory;
use Modules\Base\Contracts\BaseModel;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagEntityModel;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method WorkspaceTagEntityModel toEntity()
 */
final class WorkspaceTagModel extends BaseModel
{
    use WorkspaceTagProps;

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_tags', $alias);
    }

    public function modelEntity(): string
    {
        return WorkspaceTagEntityModel::class;
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = WorkspaceTagModel::class;
        };
    }
}
