<?php

namespace Modules\Workspace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Models\ChatModel;
use Modules\Workspace\Database\Factories\WorkspaceChatFactory;
use Modules\Workspace\Entities\WorkspaceChat\WorkspaceChatEntityModel;
use Modules\Workspace\Entities\WorkspaceChat\WorkspaceChatProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read  WorkspaceModel $workspace
 * @property-read  ChatModel $chat
 * @method WorkspaceChatEntityModel toEntity()
 * @method static WorkspaceChatFactory factory()
 */
class WorkspaceChatModel extends BaseModel
{
    use HasFactory;
    use WorkspaceChatProps;

    public function modelEntity(): string
    {
        return WorkspaceChatEntityModel::class;
    }

    protected static function newFactory(): WorkspaceChatFactory
    {
        return new WorkspaceChatFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('workspace_chats', $alias);
    }

    public function getGuarded():array
    {
        $p = WorkspaceChatEntityModel::props();
        return collect($p->toArray())->except([
            $p->id
        ])->toArray();
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
