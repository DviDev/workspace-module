<?php

declare(strict_types=1);

namespace Modules\Workspace\Listeners;

use Artisan;
use Modules\Workspace\Database\Seeders\WorkspaceDatabaseSeeder;

final class SeederInitialIndependentSeederDataWorkspaceListener
{
    public function handle(): void
    {
        Artisan::call('db:seed', ['--class' => WorkspaceDatabaseSeeder::class]);
    }
}
