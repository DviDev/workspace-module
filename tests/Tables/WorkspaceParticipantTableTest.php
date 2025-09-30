<?php

declare(strict_types=1);

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Contracts\BaseTest;
use Modules\Workspace\Models\WorkspaceParticipantModel;

final class WorkspaceParticipantTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspaceParticipantModel
    {
        return WorkspaceParticipantModel::class;
    }
}
