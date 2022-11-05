<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Workspace\Database\Factories\WorkspaceTagFactory;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagEntityModel;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method WorkspaceTagEntityModel toEntity()
 * @method WorkspaceTagFactory factory()
 */
class WorkspaceTagModel extends BaseModel
{
    use HasFactory;
    use WorkspaceTagProps;

    public function modelEntity(): string
    {
        return WorkspaceTagEntityModel::class;
    }

    protected static function newFactory(): WorkspaceTagFactory
    {
        return new WorkspaceTagFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_tags', $alias);
    }
}
