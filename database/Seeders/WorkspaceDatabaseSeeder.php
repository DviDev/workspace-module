<?php

declare(strict_types=1);

namespace Modules\Workspace\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Contracts\BaseSeeder;

final class WorkspaceDatabaseSeeder extends BaseSeeder
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
