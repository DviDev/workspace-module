<?php

namespace Modules\Workspace\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Post\Models\PostModel;
use Modules\Workspace\Models\WorkspaceLinkModel;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Models\WorkspaceParticipantModel;
use Modules\Workspace\Models\WorkspacePostModel;
use Modules\Workspace\Models\WorkspaceTagModel;

class WorkspaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user, string $name)
    {
        Model::unguard();

        WorkspaceModel::factory()
            ->for($user, 'user')
            ->create(['name' => $name])
            ->each(function (WorkspaceModel $workspace) {
                $workspace->participants()->attach($workspace->user_id);

                User::query()->limit(random_int(1, config('app.SEED_PARTICIPANTS_COUNT', 2)))->where('id', '<>', $workspace->user_id)
                    ->each(function (User $user) use ($workspace) {
                        ds("seeding workspace $workspace->id participant $user->id");

                        WorkspaceParticipantModel::factory()
                            ->for($workspace)
                            ->for($user)
                            ->create();
                    });
            });

    }
}
