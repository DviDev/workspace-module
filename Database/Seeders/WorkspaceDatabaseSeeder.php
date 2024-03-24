<?php

namespace Modules\Workspace\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\Project\Database\Seeders\ProjectTableSeeder;
use Modules\Project\Models\ProjectModuleModel;
use Nwidart\Modules\Facades\Module;

class WorkspaceDatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->commandWarn(__CLASS__, "🌱 seeding");

        $modules = collect(Module::allEnabled());
        if ($modules->contains('DBMap')) {
            (new ScanTableDomain())->scan('workspace');

            if ($modules->contains('Project')) {
                $module = ProjectModuleModel::byName('Workspace');
                $this->call(ProjectTableSeeder::class, parameters: [
                    'module' => $module,
                    'project' => $module->project,
                ]);
            }
        }


        $this->commandInfo(__CLASS__, '🟢 done');
    }
}
