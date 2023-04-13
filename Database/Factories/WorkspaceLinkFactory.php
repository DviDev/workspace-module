<?php
namespace Modules\Workspace\Database\Factories;

use Modules\Base\Factories\BaseFactory;
use Modules\Workspace\Models\WorkspaceLinkModel;

/**
 * @method WorkspaceLinkModel create(array $attributes = [])
 * @method WorkspaceLinkModel make(array $attributes = [])
 */
class WorkspaceLinkFactory extends BaseFactory
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
        return $this->getValues();
    }
}
