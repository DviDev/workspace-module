<?php

namespace Modules\Workspace\Database\Factories;

use Modules\Base\Factories\BaseFactory;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkspaceModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $p = WorkspaceEntityModel::props();
        $values = $this->getValues();
        $values[$p->parent_id] = collect([
            null,
            WorkspaceModel::query()->inRandomOrder()->first()->id ?? null
        ])->random();
        return $values;
    }
}
