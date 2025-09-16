<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Models\WorkspacePostModel;

class WorkspacePostTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspacePostModel
    {
        return WorkspacePostModel::class;
    }
}
