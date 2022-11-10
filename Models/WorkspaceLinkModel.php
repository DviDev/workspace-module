<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Link\Models\LinkModel;
use Modules\Workspace\Database\Factories\WorkspaceLinkFactory;
use Modules\Workspace\Entities\WorkspaceLink\WorkspaceLinkEntityModel;
use Modules\Workspace\Entities\WorkspaceLink\WorkspaceLinkProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read WorkspaceModel $workspace
 * @property-read LinkModel $link
 * @method WorkspaceLinkEntityModel toEntity()
 * @method static WorkspaceLinkFactory factory()
 */
class WorkspaceLinkModel extends BaseModel
{
    use HasFactory;
    use WorkspaceLinkProps;

    public function modelEntity(): string
    {
        return WorkspaceLinkEntityModel::class;
    }

    protected static function newFactory(): WorkspaceLinkFactory
    {
        return new WorkspaceLinkFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_links', $alias);
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceModel::class, 'workspace_id');
    }

    public function link(): BelongsTo
    {
        return $this->belongsTo(LinkModel::class, 'link_id');
    }
}
