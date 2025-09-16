<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Models\WorkspaceTagModel;

class WorkspaceTagTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspaceTagModel
    {
        return WorkspaceTagModel::class;
    }
}
