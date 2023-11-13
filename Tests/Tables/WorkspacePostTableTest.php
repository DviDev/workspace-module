<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostEntityModel;
use Modules\Workspace\Models\WorkspacePostModel;

class WorkspacePostTableTest extends BaseTest
{

    public function getEntityClass(): string|WorkspacePostEntityModel
    {
        return WorkspacePostEntityModel::class;
    }

    public function getModelClass(): string|WorkspacePostModel
    {
        return WorkspacePostModel::class;
    }

    public function testTableMustExist()
    {
        parent::tableMustExist();
    }

    public function testTableHasExpectedColumns()
    {
        parent::tableHasExpectedColumns();
    }

    public function testCanCreateInstanceOfEntity()
    {
        parent::canCreateInstanceOfEntity();
    }

    public function testCanCreateInstanceOfModel()
    {
        parent::canCreateInstanceOfModel();
    }

    public function testShouldSave($attributes = null)
    {
        parent::shouldSave($attributes);
    }

    public function testShouldUpdate($attributes = null)
    {
        parent::shouldUpdate($attributes);
    }

    public function testShouldDelete()
    {
        parent::shouldDelete();
    }

    protected function create(): WorkspacePostModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
