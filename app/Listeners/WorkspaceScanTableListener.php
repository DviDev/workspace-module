<?php

declare(strict_types=1);

namespace Modules\Workspace\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\DBMap\Events\ScanTableEvent;

final class WorkspaceScanTableListener implements ShouldQueue
{
    public function handle(ScanTableEvent $event): void
    {
        (new ScanTableDomain)->scan('workspace');
    }
}
