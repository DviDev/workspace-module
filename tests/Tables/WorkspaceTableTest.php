<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspaceModel
    {
        return WorkspaceModel::class;
    }
}
