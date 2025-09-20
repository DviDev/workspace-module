<?php

declare(strict_types=1);

namespace Modules\Workspace\Entities\WorkspaceChat;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Workspace\Models\WorkspaceChatModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read WorkspaceChatModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class WorkspaceChatEntityModel extends BaseEntityModel
{
    use WorkspaceChatProps;
}
