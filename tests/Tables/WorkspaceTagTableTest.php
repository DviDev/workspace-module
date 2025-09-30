<?php

declare(strict_types=1);

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Contracts\BaseTest;
use Modules\Workspace\Models\WorkspaceTagModel;

final class WorkspaceTagTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspaceTagModel
    {
        return WorkspaceTagModel::class;
    }
}
