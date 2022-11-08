<?php

namespace Modules\Workspace\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Workspace\Database\Factories\WorkspaceFactory;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Entities\Workspace\WorkspaceProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read User $user
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
}
