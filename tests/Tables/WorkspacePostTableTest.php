<?php

declare(strict_types=1);

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Contracts\BaseTest;
use Modules\Workspace\Models\WorkspacePostModel;

final class WorkspacePostTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspacePostModel
    {
        return WorkspacePostModel::class;
    }
}
