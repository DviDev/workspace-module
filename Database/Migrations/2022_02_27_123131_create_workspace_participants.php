<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Workspace\Entities\WorkspaceParticipant\WorkspaceParticipantEntityModel;
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspace_participants');
    }
};
