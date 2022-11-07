<?php

namespace Modules\Workspace\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceFactory extends Factory
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
        return [
            $p->user_id => null,
            $p->parent_id => collect([null, WorkspaceModel::query()->inRandomOrder()->first()->id ?? null])->random(),
            $p->name => $this->faker->words(3, true),
            $p->description => $this->faker->text()
        ];
    }
}
