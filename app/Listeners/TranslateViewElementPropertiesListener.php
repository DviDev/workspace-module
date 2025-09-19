<?php

declare(strict_types=1);

namespace Modules\Workspace\Listeners;

use Modules\Base\Contracts\BaseTranslateViewElementPropertiesListener;

final class TranslateViewElementPropertiesListener extends BaseTranslateViewElementPropertiesListener
{
    protected function moduleName(): string
    {
        return config('workspace.name');
    }

    protected function moduleNameLower(): string
    {
        return mb_strtolower(config('workspace.name'));
    }
}
