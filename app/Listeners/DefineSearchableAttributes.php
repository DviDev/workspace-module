<?php

namespace Modules\Workspace\Listeners;

use Modules\Project\Contracts\DefineSearchableAttributesContract;

class DefineSearchableAttributes extends DefineSearchableAttributesContract
{
    protected function searchableFields(): array
    {
        return [];
    }

    protected function moduleName(): string
    {
        return config('workspace.name');
    }
}
