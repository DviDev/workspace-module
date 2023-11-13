<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Workspace\Entities\WorkspaceChat\WorkspaceChatEntityModel;
use Nwidart\Modules\Facades\Module;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!collect(Module::allEnabled())->contains('Chat')) {
            return;
        }
        Schema::create('workspace_chats', function (Blueprint $table) {
            $p = WorkspaceChatEntityModel::props(null, true);
            $table->id();
            $table->foreignId($p->workspace_id)
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->chat_id)
                ->references('id')->on('chats')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp($p->created_at);
            $table->timestamp($p->updated_at)->useCurrent();
            $table->timestamp($p->deleted_at)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspace_chats');
    }
};
