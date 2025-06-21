<?php

namespace Modules\Workspace\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Workspace\Entities\WorkspaceProject\WorkspaceProjectEntityModel;
use Modules\Workspace\Models\WorkspaceProjectModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method WorkspaceProjectModel model()
 * @method WorkspaceProjectEntityModel find($id)
 * @method WorkspaceProjectModel first()
 * @method WorkspaceProjectModel findOrNew($id)
 * @method WorkspaceProjectModel firstOrNew($query)
 * @method WorkspaceProjectEntityModel findOrFail($id)
 */
class WorkspaceProjectRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return WorkspaceProjectModel::class;
    }
}
