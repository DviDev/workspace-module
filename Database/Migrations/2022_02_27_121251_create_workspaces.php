<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->id();

            $prop = WorkspaceEntityModel::props(null, true);
            $table->foreignId($prop->user_id)->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->parent_id)
                ->nullable()
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->string($prop->name, 100);
            $table->string($prop->description, 200)->nullable();
            $table->timestamp($prop->created_at);
            $table->timestamp($prop->updated_at);
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
        Schema::dropIfExists('workspaces');
    }
};
