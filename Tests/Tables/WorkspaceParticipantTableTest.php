<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;
use Modules\Workspace\Models\WorkspaceParticipantModel;

class WorkspaceParticipantTableTest extends BaseTest
{

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

    protected function create(): WorkspaceParticipantModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
