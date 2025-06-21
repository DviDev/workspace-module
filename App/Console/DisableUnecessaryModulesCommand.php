<?php

namespace Modules\Workspace\App\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Nwidart\Modules\Facades\Module;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class DisableUnecessaryModulesCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'workspace:disable-no-dependent-modules';

    /**
     * The console command description.
     */
    protected $description = 'Command description.';

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
        $modules = Module::all();
        collect($modules)->each(function ($module) {
            if (! in_array($module, ['Workspace', 'App', 'Chat', 'DBMap', 'Permission', 'Project', 'Task', 'View'])) {
                Artisan::call('module:disable '.$module);
            }
        });
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
