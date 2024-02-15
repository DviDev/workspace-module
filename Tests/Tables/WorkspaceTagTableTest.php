<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagEntityModel;
use Modules\Workspace\Models\WorkspaceTagModel;

class WorkspaceTagTableTest extends BaseTest
{
//    use DatabaseTransactions;

    public function getEntityClass(): string|WorkspaceTagEntityModel
    {
        return WorkspaceTagEntityModel::class;
    }

    public function getModelClass(): string|WorkspaceTagModel
    {
        return WorkspaceTagModel::class;
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

    protected function create(): WorkspaceTagModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
