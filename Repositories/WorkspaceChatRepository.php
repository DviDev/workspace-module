<?php

namespace Modules\Workspace\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Workspace\Entities\WorkspaceChat\WorkspaceChatEntityModel;
use Modules\Workspace\Models\WorkspaceChatModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method WorkspaceChatModel model()
 * @method WorkspaceChatEntityModel find($id)
 * @method WorkspaceChatModel first()
 * @method WorkspaceChatModel findOrNew($id)
 * @method WorkspaceChatModel firstOrNew($query)
 * @method WorkspaceChatEntityModel findOrFail($id)
 */
class WorkspaceChatRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return WorkspaceChatModel::class;
    }
}
