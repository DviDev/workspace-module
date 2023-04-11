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

    protected function create(): WorkspacePostModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
