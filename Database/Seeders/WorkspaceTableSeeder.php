<?php

namespace Modules\Workspace\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\App\Entities\User\UserType;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Models\WorkspaceParticipantModel;

class WorkspaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $superAdmin = User::query()->where('type', UserType::SUPER_ADMIN->value)->get()->first();

        WorkspaceModel::factory(2)
            ->for($superAdmin)

            ->sequence(
                ['name' => 'Personal'],
                ['name' => 'Customers']
            )
            ->afterCreating(function ($workspace) {
                WorkspaceParticipantModel::factory(config('app.SEED_PARTICIPANTS_COUNT', 2))
                    ->for($workspace)
                    ->for(User::factory()->create())
                    ->create();
            })
            ->create();

    }
}
