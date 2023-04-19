<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Workspace\Entities\WorkspaceTag\WorkspaceTagEntityModel;

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
            $table->foreignId($props->workspace_id)
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($props->created_by_user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($props->name, 50);
            $table->timestamp($props->created_at)->useCurrent();
            $table->timestamp($props->updated_at)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspace_tags');
    }
};
