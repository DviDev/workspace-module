<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\WorkspaceLink\WorkspaceLinkEntityModel;
use Modules\Workspace\Models\WorkspaceLinkModel;

class WorkspaceLinkTableTest extends BaseTest
{

    public function getEntityClass(): string|WorkspaceLinkEntityModel
    {
        return WorkspaceLinkEntityModel::class;
    }

    public function getModelClass(): string|WorkspaceLinkModel
    {
        return WorkspaceLinkModel::class;
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

    protected function create(): WorkspaceLinkModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
