<?php

namespace Modules\Workspace\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Base\Events\BaseSeederInitialIndependentDataEvent;
use Modules\Person\Events\UserCreatedEvent;
use Modules\Workspace\Listeners\WorkspaceInitialIndependentSeederDataListener;
use Modules\Workspace\Listeners\WorkspaceUserCreatedListener;

class WorkspaceEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserCreatedEvent::class => [WorkspaceUserCreatedListener::class],
        BaseSeederInitialIndependentDataEvent::class => [WorkspaceInitialIndependentSeederDataListener::class],
    ];
}
