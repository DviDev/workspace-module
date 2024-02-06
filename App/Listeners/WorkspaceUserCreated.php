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
        $workspace = WorkspaceModel::query()->create([
            'name' => $event->user->name . "'s " . trans('Personal'),
            'user_id' => $event->user->id
        ]);
        $workspace->participants()->sync([$event->user->id]);
    }
}
