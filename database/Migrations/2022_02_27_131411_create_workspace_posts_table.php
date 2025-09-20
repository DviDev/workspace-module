<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Workspace\Entities\WorkspacePost\WorkspacePostEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('workspace_posts', function (Blueprint $table): void {
            $p = WorkspacePostEntityModel::props(null, true);
            $table->id();
            $table->foreignId($p->workspace_id)
                ->references('id')->on('workspaces')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->unsignedBigInteger($p->post_id);
            if (Module::isEnabled('Post')) {
                $table->foreign($p->post_id)->references('id')->on('threads')
                    ->cascadeOnUpdate()->restrictOnDelete();
            }
        });
    }

    public function down()
    {
        Schema::dropIfExists('workspace_posts');
    }
};
