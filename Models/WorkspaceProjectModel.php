<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Project\Models\ProjectModel;
use Modules\Workspace\Database\Factories\WorkspaceProjectFactory;
use Modules\Workspace\Entities\WorkspaceProject\WorkspaceProjectEntityModel;
use Modules\Workspace\Entities\WorkspaceProject\WorkspaceProjectProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method WorkspaceProjectEntityModel toEntity()
 * @method static WorkspaceProjectFactory factory()
 */
class WorkspaceProjectModel extends BaseModel
{
    use HasFactory;
    use WorkspaceProjectProps;

    public function modelEntity(): string
    {
        return WorkspaceProjectEntityModel::class;
    }

    protected static function newFactory(): WorkspaceProjectFactory
    {
        return new WorkspaceProjectFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_projects', $alias);
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'project_id');
    }
}
