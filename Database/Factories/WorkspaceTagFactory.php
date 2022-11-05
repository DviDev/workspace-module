<?php
namespace Modules\Workspace\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagEntityModel;
use Modules\Workspace\Models\WorkspaceTagModel;

/**
 * @method WorkspaceTagModel create(array $attributes = [])
 * @method WorkspaceTagModel make(array $attributes = [])
 */
class WorkspaceTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkspaceTagModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = WorkspaceTagEntityModel::props(null, true);
        return [

        ];
    }
}
