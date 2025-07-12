<?php

namespace Modules\Workspace\App\Observers;

use App\Models\User;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceUserObserver
{
    /**
     * Handle the WorkspaceUserObserver "created" event.
     */
    public function created(User $user): void
    {
        /** @var WorkspaceModel $w */
        $w = WorkspaceModel::query()->create([
            'name' => trans('My workspace'),
            'user_id' => $user->id,
        ]);
        $w->participants()->save($user);
    }

    /**
     * Handle the WorkspaceUserObserver "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the WorkspaceUserObserver "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the WorkspaceUserObserver "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the WorkspaceUserObserver "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
