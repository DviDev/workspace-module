<?php

namespace Modules\Workspace\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;
use Modules\Workspace\Models\WorkspaceParticipantModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method WorkspaceParticipantModel model()
 * @method WorkspaceParticipantEntityModel find($id)
 * @method WorkspaceParticipantModel first()
 * @method WorkspaceParticipantModel findOrNew($id)
 * @method WorkspaceParticipantModel firstOrNew($query)
 * @method WorkspaceParticipantEntityModel findOrFail($id)
 */
class WorkspaceParticipantRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return WorkspaceParticipantModel::class;
    }
}
