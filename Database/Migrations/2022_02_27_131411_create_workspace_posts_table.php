<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspace_posts', function (Blueprint $table) {
            $p = WorkspacePostEntityModel::props(null, true);
            $table->id();
            $table->foreignId($p->workspace_id)
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->unsignedBigInteger($p->post_id);
            if (collect(Module::allEnabled())->contains('Post')) {
                $table->foreign($p->post_id)->references('id')->on('posts')
                    ->cascadeOnUpdate()->restrictOnDelete();
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
        Schema::dropIfExists('workspace_posts');
    }
};
