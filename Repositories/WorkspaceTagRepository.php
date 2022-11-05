<?php

namespace Modules\Workspace\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Workspace\Entities\WorkspaceTagEntityModel;
use Modules\Workspace\Models\WorkspaceTagModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method WorkspaceTagModel model()
 * @method WorkspaceTagEntityModel find($id)
 * @method WorkspaceTagModel first()
 * @method WorkspaceTagModel findOrNew($id)
 * @method WorkspaceTagModel firstOrNew($query)
 * @method WorkspaceTagEntityModel findOrFail($id)
 */
class WorkspaceTagRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return WorkspaceTagModel::class;
    }
}
