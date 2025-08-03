<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Workspace\Entities\WorkspaceLink\WorkspaceLinkEntityModel;

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
            $table->unsignedBigInteger($p->workspace_id);
            $table->foreign($p->workspace_id)->references('id')->on('workspaces')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unsignedBigInteger($p->link_id);
            if (collect(Module::allEnabled())->contains('Link')) {
                $table->foreign($p->link_id)
                    ->references('id')->on('links')
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            }
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
