<?php
namespace Modules\Workspace\Database\Factories;

use Modules\Base\Factories\BaseFactory;
use Modules\Workspace\Models\WorkspaceParticipantModel;

/**
 * @method WorkspaceParticipantModel create(array $attributes = [])
 * @method WorkspaceParticipantModel make(array $attributes = [])
 */
class WorkspaceParticipantFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkspaceParticipantModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [];
    }
}
