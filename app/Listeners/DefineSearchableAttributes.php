<?php

namespace Modules\Workspace\Listeners;

use Modules\Project\Events\EntityAttributesCreatedEvent;
use Modules\Project\Models\ProjectModuleEntityAttributeModel;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

class DefineSearchableAttributes
{
    private EntityAttributesCreatedEvent $event;

    public function handle(EntityAttributesCreatedEvent $event): void
    {
        $this->event = $event;
        if ($event->entity->module->name !== config('workspace.name')) {
            return;
        }

        foreach ($event->entity->entityAttributes as $attribute) {
            $this->default($attribute);
        }
    }

    protected function default(ProjectModuleEntityAttributeModel $attribute): void
    {
        if ($this->event->entity->name !== WorkspaceModel::table()) {
            return;
        }
        $p = WorkspaceEntityModel::props();
        if (in_array($attribute->name, [
            $p->id,
        ])) {
            $attribute->update(['searchable' => true]);
        }
    }
}
