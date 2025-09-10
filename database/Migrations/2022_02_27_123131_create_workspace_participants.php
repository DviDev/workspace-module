<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;

return new class extends Migration
{

    public function up()
    {
        Schema::create('workspace_participants', function (Blueprint $table) {
            $table->id();

            $prop = WorkspaceParticipantEntityModel::props(null, true);
            $table->foreignId($prop->workspace_id)
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId($prop->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp($prop->created_at)->useCurrent();
            $table->timestamp($prop->deleted_at)->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists('workspace_participants');
    }
};
