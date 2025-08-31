<?php

namespace Modules\Workspace\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\DBMap\Events\ScanTableEvent;
use Symfony\Component\Console\Output\ConsoleOutput;

class WorkspaceScanTableListener implements ShouldQueue
{
    public function handle(ScanTableEvent $event): void
    {
        $output = new ConsoleOutput;
        $output->writeln(PHP_EOL.'🤖  Workspace module: scanning ...');
        new ScanTableDomain()->scan('workspace');
        $output->writeln('🤖  Workspace module: ✔ DONE');
    }
}
