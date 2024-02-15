<?php

namespace Modules\Workspace\App\Providers;

use App\Events\UserCreated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Workspace\App\Listeners\WorkspaceUserCreatedListener;

class WorkspaceEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserCreated::class => [WorkspaceUserCreatedListener::class]
    ];
}
