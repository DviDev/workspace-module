<?php

namespace Modules\Workspace\Listeners;

use Modules\Project\Contracts\CreateMenuItemsListenerContract;

class CreateMenuItemsListener extends CreateMenuItemsListenerContract
{
    protected function moduleName(): string
    {
        return config('workspace.name');
    }
}
