<?php

namespace Modules\Workspace\Listeners;

use Modules\Person\Events\UserCreatedEvent;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceUserCreatedListener
{
    /**
     * Handle the event.
     */
    public function handle(UserCreatedEvent $event): void
    {
        /** @var WorkspaceModel $workspace */
        $name = $event->user->name."'s ".str(__('personal'))->ucfirst();
        $workspace = WorkspaceModel::query()->create([
            'name' => $name,
            'user_id' => $event->user->id,
            'description' => 'via '.__CLASS__,
        ]);
        $workspace->participants()->sync([$event->user->id]);
    }
}
