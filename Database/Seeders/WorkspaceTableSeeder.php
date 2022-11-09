<?php

namespace Modules\Workspace\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Workspace\Models\WorkspaceModel;

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

        WorkspaceModel::factory()->count(3)->for($user, 'user')->create();
    }
}
