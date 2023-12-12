<?php

namespace Modules\Workspace\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\DBMap\Domains\ScanTableDomain;

class WorkspaceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->warn(PHP_EOL . '🤖 Escaneando módulo Workspace ...');
        (new ScanTableDomain())->scan('workspace');
    }
}
