<?php
namespace Modules\Workspace\Database\Factories;

use Modules\Base\Factories\BaseFactory;
use Modules\Workspace\Models\WorkspaceTagModel;

/**
 * @method WorkspaceTagModel create(array $attributes = [])
 * @method WorkspaceTagModel make(array $attributes = [])
 */
class WorkspaceTagFactory extends BaseFactory
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
        return $this->getValues();
    }
}
