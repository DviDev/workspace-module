<?php

namespace Modules\Workspace\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method WorkspaceModel model()
 * @method WorkspaceEntityModel find($id)
 * @method WorkspaceModel first()
 * @method WorkspaceModel findOrNew($id)
 * @method WorkspaceModel firstOrNew($query)
 * @method WorkspaceEntityModel findOrFail($id)
 */
class WorkspaceRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return WorkspaceModel::class;
    }
}
