<?php

namespace Modules\Workspace\Listeners;

use Modules\Base\Contracts\BaseTranslateViewElementPropertiesListener;

class TranslateViewElementPropertiesListener extends BaseTranslateViewElementPropertiesListener
{
    protected function moduleName(): string
    {
        return config('workspace.name');
    }

    protected function moduleNameLower(): string
    {
        return strtolower(config('workspace.name'));
    }
}
