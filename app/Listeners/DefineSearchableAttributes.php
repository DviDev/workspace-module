<?php

declare(strict_types=1);

namespace Modules\Workspace\Listeners;

use Modules\Project\Contracts\DefineSearchableAttributesContract;

final class DefineSearchableAttributes extends DefineSearchableAttributesContract
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
