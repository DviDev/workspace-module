<?php

namespace Modules\Workspace\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostEntityModel;
use Modules\Workspace\Models\WorkspacePostModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method WorkspacePostModel model()
 * @method WorkspacePostEntityModel find($id)
 * @method WorkspacePostModel first()
 * @method WorkspacePostModel findOrNew($id)
 * @method WorkspacePostModel firstOrNew($query)
 * @method WorkspacePostEntityModel findOrFail($id)
 */
class WorkspacePostRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return WorkspacePostModel::class;
    }
}
