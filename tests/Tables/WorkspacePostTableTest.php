<?php

declare(strict_types=1);

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Contracts\Tests\BaseTest;
use Modules\Workspace\Models\WorkspacePostModel;

final class WorkspacePostTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspacePostModel
    {
        return WorkspacePostModel::class;
    }
}
