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
            $table->bigInteger($p->workspace_id)->unsigned();
            $table->bigInteger($p->post_id)->unsigned();
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
