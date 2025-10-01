<?php

declare(strict_types=1);

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Contracts\BaseTest;
use Modules\Workspace\Models\WorkspaceLinkModel;

final class WorkspaceLinkTableTest extends BaseTest
{
    public function getModelClass(): string|WorkspaceLinkModel
    {
        return WorkspaceLinkModel::class;
    }
}
