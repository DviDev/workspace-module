<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
            $table->foreignId($p->workspace_id)
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->project_id)
                ->references('id')->on('projects')
                ->cascadeOnUpdate()->restrictOnDelete();
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
