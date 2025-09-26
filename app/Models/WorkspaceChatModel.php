<?php

declare(strict_types=1);

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\BaseFactory;
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
final class WorkspaceChatModel extends BaseModel
{
    use WorkspaceChatProps;

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_chats', $alias);
    }

    public function modelEntity(): string
    {
        return WorkspaceChatEntityModel::class;
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(self::class, 'workspace_id');
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(ChatModel::class, 'chat_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = WorkspaceChatModel::class;
        };
    }
}
