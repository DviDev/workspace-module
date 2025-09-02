<?php

namespace Modules\Workspace\Listeners;

use Modules\Workspace\Database\Seeders\WorkspaceDatabaseSeeder;

class SeederInitialIndependentSeederDataWorkspaceListener
{
    public function handle(): void
    {
        \Artisan::call('db:seed', ['--class' => WorkspaceDatabaseSeeder::class]);
    }
}
