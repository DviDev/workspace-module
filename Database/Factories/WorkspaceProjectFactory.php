<?php
namespace Modules\Workspace\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Workspace\Models\WorkspaceProjectModel;
use Modules\Workspace\Entities\WorkspaceProject\WorkspaceProjectEntityModel;

/**
 * @method WorkspaceProjectModel create(array $attributes = [])
 * @method WorkspaceProjectModel make(array $attributes = [])
 */
class WorkspaceProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkspaceProjectModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = WorkspaceProjectEntityModel::props(null, true);
        return [
            $p->workspace_id => null,
            $p->project_id => null,
        ];
    }
}
