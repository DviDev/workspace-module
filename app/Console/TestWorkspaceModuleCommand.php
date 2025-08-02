<?php

namespace Modules\Workspace\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Nwidart\Modules\Facades\Module;

class TestWorkspaceModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'workspace:test {class}';

    /**
     * The console command description.
     */
    protected $description = 'Test Workspace Module.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $argument = $this->argument('class');
        Artisan::call('workspace:disable-no-dependent-modules');

        Artisan::call('test', ['filter' => $argument]);
        $this->info(Artisan::output());

        collect(Module::all())->each(fn ($module) => Artisan::call('module:enable '.$module));
    }

    protected function getClass($class): string
    {
        return str($class)
            ->replace('\\', '/')
            ->append('.php')
            ->value();
    }
}
