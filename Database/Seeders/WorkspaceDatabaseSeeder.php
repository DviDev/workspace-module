<?php

namespace Modules\Workspace\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Project\Database\Seeders\ProjectTableSeeder;
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


            if ($modules->contains('Project')) {
//                $module = ProjectModuleModel::byName('Workspace');
                $this->call(ProjectTableSeeder::class, parameters: [
                    'module_name' => 'DBMap',
//                    'project' => $module->project,
                ]);
            }
        }


        $this->commandInfo(__CLASS__, '🟢 done');
    }
}
