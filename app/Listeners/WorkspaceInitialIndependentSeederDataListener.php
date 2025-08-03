<?php

namespace Modules\Workspace\Listeners;

use Modules\Workspace\Database\Seeders\WorkspaceDatabaseSeeder;

class WorkspaceInitialIndependentSeederDataListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        \Artisan::call('db:seed', ['--class' => WorkspaceDatabaseSeeder::class]);
    }
}
