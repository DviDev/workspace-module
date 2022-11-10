<?php

namespace Modules\Workspace\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Workspace\Entities\WorkspaceLink\WorkspaceLinkEntityModel;
use Modules\Workspace\Models\WorkspaceLinkModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method WorkspaceLinkModel model()
 * @method WorkspaceLinkEntityModel find($id)
 * @method WorkspaceLinkModel first()
 * @method WorkspaceLinkModel findOrNew($id)
 * @method WorkspaceLinkModel firstOrNew($query)
 * @method WorkspaceLinkEntityModel findOrFail($id)
 */
class WorkspaceLinkRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return WorkspaceLinkModel::class;
    }
}
