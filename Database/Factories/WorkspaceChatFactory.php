<?php
namespace Modules\Workspace\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Workspace\Models\WorkspaceChatModel;
use Modules\Workspace\Entities\WorkspaceChat\WorkspaceChatEntityModel;

/**
 * @method WorkspaceChatModel create(array $attributes = [])
 * @method WorkspaceChatModel make(array $attributes = [])
 */
class WorkspaceChatFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkspaceChatModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = WorkspaceChatEntityModel::props(null, true);
        return $this->getValues();
    }
}
