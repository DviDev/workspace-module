<?php

namespace Modules\Workspace\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\DBMap\Events\ScanTableEvent;

class WorkspaceScanTableListener implements ShouldQueue
{
    public function handle(ScanTableEvent $event): void
    {
        new ScanTableDomain()->scan('workspace');
    }
}
