<?php

namespace Modules\Workspace\Listeners;

use Modules\DBMap\Domains\ScanTableDomain;
use Modules\DBMap\Events\ScanTableEvent;

class WorkspaceScanTableListener
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
    public function handle(ScanTableEvent $event): void
    {
        $event->command->warn(PHP_EOL . '🤖 Workspace module: scanning ...');
        (new ScanTableDomain())->scan('workspace');
        $event->command->getOutput()->info('🤖 Workspace module: ✔ DONE');
    }
}
