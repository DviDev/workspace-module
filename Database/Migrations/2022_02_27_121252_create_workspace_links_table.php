<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Link\Models\LinkModel;
use Modules\Workspace\Entities\WorkspaceLink\WorkspaceLinkEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspace_links', function (Blueprint $table) {
            $p = WorkspaceLinkEntityModel::props(null, true);
            $table->id();
            $table->foreignId($p->workspace_id)
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId($p->link_id)
                ->references('id')->on('links')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspace_links');
    }
};
