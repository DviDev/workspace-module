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

    protected function create(): WorkspaceLinkModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
