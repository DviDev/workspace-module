<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Workspace\Entities\WorkspaceProject\WorkspaceProjectEntityModel;

return new class extends Migration
{
    public function up()
    {
        if (! moduleIsEnabled('Project')) {
            return;
        }
        Schema::create('workspace_projects', function (Blueprint $table): void {
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

    public function down()
    {
        Schema::dropIfExists('workspace_projects');
    }
};
