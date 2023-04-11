<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagEntityModel;
use Modules\Workspace\Models\WorkspaceTagModel;

class WorkspaceTagTableTest extends BaseTest
{

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
        parent::testTableMustExist();
    }

    public function testTableHasExpectedColumns()
    {
        parent::testTableHasExpectedColumns();
    }

    public function testCanCreateInstanceOfEntity()
    {
        parent::testCanCreateInstanceOfEntity();
    }

    public function testCanCreateInstanceOfModel()
    {
        parent::testCanCreateInstanceOfModel();
    }

    public function testShouldSave($attributes = null)
    {
        parent::testShouldSave($attributes);
    }

    public function testShouldUpdate($attributes = null)
    {
        parent::testShouldUpdate($attributes);
    }

    public function testShouldDelete()
    {
        parent::testShouldDelete();
    }

    protected function create(): WorkspaceTagModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
