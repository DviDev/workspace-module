<?php

namespace Modules\Workspace\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;

class WorkspaceDatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->seeding();

        $this->call(WorkspaceTableSeeder::class);

        $this->done();
    }
}
