<?php
namespace Modules\Workspace\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;
use Modules\Workspace\Models\WorkspaceParticipantModel;

/**
 * @method WorkspaceParticipantModel create(array $attributes = [])
 * @method WorkspaceParticipantModel make(array $attributes = [])
 */
class WorkspaceParticipantFactory extends Factory
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
        $p = WorkspaceParticipantEntityModel::props(null, true);
        return [

        ];
    }
}
