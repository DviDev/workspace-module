<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Models\WorkspaceParticipantModel;

class WorkspaceParticipantTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspaceParticipantModel
    {
        return WorkspaceParticipantModel::class;
    }
}
