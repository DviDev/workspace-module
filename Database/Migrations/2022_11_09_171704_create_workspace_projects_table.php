<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Workspace\Entities\WorkspaceProject\WorkspaceProjectEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspace_projects', function (Blueprint $table) {
            $p = WorkspaceProjectEntityModel::props(null, true);
            $table->id();
            $table->bigInteger($p->workspace_id)->unsigned();
            $table->bigInteger($p->project_id)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspace_projects');
    }
};
