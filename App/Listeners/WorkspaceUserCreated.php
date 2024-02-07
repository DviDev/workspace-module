<?php

namespace Modules\Workspace\App\Listeners;

use App\Events\UserCreated;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceUserCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        /**@var WorkspaceModel $workspace */
        $name = $event->user->name . "'s " . trans('Personal');
        $workspace = WorkspaceModel::query()->create([
            'name' => $name,
            'user_id' => $event->user->id
        ]);
        $workspace->participants()->sync([$event->user->id]);
    }
}
