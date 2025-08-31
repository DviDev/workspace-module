<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatModel;
use Modules\Workspace\Entities\WorkspaceChat\WorkspaceChatEntityModel;
use Modules\Workspace\Entities\WorkspaceChat\WorkspaceChatProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read  WorkspaceModel $workspace
 * @property-read  ChatModel $chat
 *
 * @method WorkspaceChatEntityModel toEntity()
 */
class WorkspaceChatModel extends BaseModel
{
    use WorkspaceChatProps;

    public function modelEntity(): string
    {
        return WorkspaceChatEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = WorkspaceChatModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_chats', $alias);
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(WorkspaceChatModel::class, 'workspace_id');
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(ChatModel::class, 'chat_id');
    }
}
