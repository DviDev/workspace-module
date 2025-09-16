<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagEntityModel;
use Modules\Workspace\Models\WorkspaceTagModel;

class WorkspaceTagTableTest extends BaseTest
{


    public function getModelClass(): string|WorkspaceTagModel
    {
        return WorkspaceTagModel::class;
    }

    public function test_table_must_exist()
    {
        parent::tableMustExist();
    }

    public function test_table_has_expected_columns()
    {
        parent::tableHasExpectedColumns();
    }

    public function test_can_create_instance_of_entity()
    {
        parent::canCreateInstanceOfEntity();
    }

    public function test_can_create_instance_of_model()
    {
        parent::canCreateInstanceOfModel();
    }

    public function test_should_save($attributes = null)
    {
        parent::shouldSave($attributes);
    }

    public function test_should_update($attributes = null)
    {
        parent::shouldUpdate($attributes);
    }

    public function test_should_delete()
    {
        parent::shouldDelete();
    }

    protected function create(): WorkspaceTagModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
