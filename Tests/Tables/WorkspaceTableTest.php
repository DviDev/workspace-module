<?php

namespace Modules\Workspace\Tests\Tables;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceTableTest extends BaseTest
{
    use RefreshDatabase;

    public function getEntityClass(): string|WorkspaceEntityModel
    {
        return WorkspaceEntityModel::class;
    }

    public function getModelClass(): string|WorkspaceModel
    {
        return WorkspaceModel::class;
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

    protected function create(): WorkspaceModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
