<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
            $table->bigInteger($p->workspace_id)->unsigned();
            $table->bigInteger($p->link_id)->unsigned();
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
