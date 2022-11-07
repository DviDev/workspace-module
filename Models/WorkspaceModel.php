<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Workspace\Database\Factories\WorkspaceFactory;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Entities\Workspace\WorkspaceProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
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
}
