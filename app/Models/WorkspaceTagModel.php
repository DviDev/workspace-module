<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagEntityModel;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method WorkspaceTagEntityModel toEntity()
 */
class WorkspaceTagModel extends BaseModel
{
    use HasFactory;
    use WorkspaceTagProps;

    public function modelEntity(): string
    {
        return WorkspaceTagEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = WorkspaceTagModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_tags', $alias);
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }
}
