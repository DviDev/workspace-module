<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Models\WorkspaceLinkModel;

class WorkspaceLinkTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspaceLinkModel
    {
        return WorkspaceLinkModel::class;
    }
}
