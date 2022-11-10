<?php
namespace Modules\Workspace\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Workspace\Models\WorkspaceLinkModel;
use Modules\Workspace\Entities\WorkspaceLink\WorkspaceLinkEntityModel;

/**
 * @method WorkspaceLinkModel create(array $attributes = [])
 * @method WorkspaceLinkModel make(array $attributes = [])
 */
class WorkspaceLinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkspaceLinkModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = WorkspaceLinkEntityModel::props(null, true);
        return [
            $p->workspace_id => null,
            $p->link_id => null,
        ];
    }
}
