<?php
namespace Modules\Workspace\Database\Factories;

use Modules\Base\Factories\BaseFactory;
use Modules\Workspace\Models\WorkspacePostModel;

/**
 * @method WorkspacePostModel create(array $attributes = [])
 * @method WorkspacePostModel make(array $attributes = [])
 */
class WorkspacePostFactory extends BaseFactory
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
        return $this->getValues();
    }
}
