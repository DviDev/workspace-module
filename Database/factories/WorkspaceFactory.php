<?php

namespace Modules\Workspace\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Workspace\Entities\WorkspaceEntityModel;
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
            $p->user_id => auth()->user()->id,
            $p->name => $this->faker->words(3, true),
            $p->description => $this->faker->text()
        ];
    }
}

