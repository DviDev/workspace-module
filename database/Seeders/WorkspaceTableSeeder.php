<?php

namespace Modules\Workspace\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->commandWarn(__CLASS__, '🌱 seeding');

        $superAdmin = User::query()->where('type_id', 2)->get()->first();

        WorkspaceModel::factory(2)
            ->for($superAdmin)
            ->sequence(
                ['name' => 'Personal'],
                ['name' => 'Customers']
            )
            ->afterCreating(function (WorkspaceModel $workspace) {
                /*WorkspaceProjectModel::factory()
                    ->for($workspace)
                    ->for(ProjectModel::first())
                    ->create();*/

                $workspace->participants()->attach([$workspace->user_id, ...User::factory(2)->create()->modelKeys()]);
            })
            ->create();

        $this->commandInfo(__CLASS__, '🟢 done');
    }
}
