<?php
namespace Modules\Workspace\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Workspace\Models\WorkspacePostModel;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostEntityModel;

/**
 * @method WorkspacePostModel create(array $attributes = [])
 * @method WorkspacePostModel make(array $attributes = [])
 */
class WorkspacePostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkspacePostModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = WorkspacePostEntityModel::props(null, true);
        return [
            $p->workspace_id => null,
            $p->post_id => null,
        ];
    }
}
