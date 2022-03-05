<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Workspace\Entities\WorkspaceTagEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspace_tags', function (Blueprint $table) {
            $table->id();

            $props = WorkspaceTagEntityModel::props(null, true);
            $table->bigInteger($props->workspace_id);
            $table->bigInteger($props->created_by_user_id);
            $table->string($props->name, 50);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
};
