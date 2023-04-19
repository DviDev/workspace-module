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
    public function run(User $user)
    {
        Model::unguard();

        WorkspaceModel::factory()
            ->count(config('app.SEED_WORKSPACE_COUNT'))
            ->for($user, 'user')->create()
            ->each(function (WorkspaceModel $workspace) {
                User::query()->limit(random_int(1, config('app.SEED_PARTICIPANTS_COUNT')))->where('id', '<>', $workspace->user_id)
                    ->each(function (User $user) use ($workspace) {
                        ds("seeding workspace $workspace->id participant $user->id");

                        WorkspaceParticipantModel::factory()
                            ->for($workspace, 'workspace')
                            ->for($user, 'participant')
                            ->create();

                    });
            });

    }
}
