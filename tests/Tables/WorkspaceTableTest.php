<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceTableTest extends BaseTest
{

    public function getModelClass(): string|WorkspaceModel
    {
        return WorkspaceModel::class;
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
        $p = WorkspaceEntityModel::props();

        /** @var WorkspaceEntityModel $model */
        $model = $this->create();

        if ($model->parent_id) {
            try {
                $model->delete();
            } catch (\Exception $exception) {
                $this->assertTrue($exception->getCode() == '23000');

                return;
            }
        }

        $this->assertDatabaseMissing($this->getModelClass()::table(), $model->attributesToArray());
    }

    protected function create(): WorkspaceModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
