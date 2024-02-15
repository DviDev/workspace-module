<?php

namespace Modules\Workspace\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceTableTest extends BaseTest
{
//    use RefreshDatabase;

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
        $p = WorkspaceEntityModel::props();

        /**@var WorkspaceEntityModel $model */
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
