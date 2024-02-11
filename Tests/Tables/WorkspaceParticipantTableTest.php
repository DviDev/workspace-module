<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;
use Modules\Workspace\Models\WorkspaceParticipantModel;

class WorkspaceParticipantTableTest extends BaseTest
{
//    use RefreshDatabase;
//    use DatabaseTransactions;
    public function getEntityClass(): string|WorkspaceParticipantEntityModel
    {
        return WorkspaceParticipantEntityModel::class;
    }

    public function getModelClass(): string|WorkspaceParticipantModel
    {
        return WorkspaceParticipantModel::class;
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

    protected function create(): WorkspaceParticipantModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
