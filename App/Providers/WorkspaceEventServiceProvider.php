<?php

namespace Modules\Workspace\App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\App\Events\UserCreatedEvent;
use Modules\Base\Events\BaseSeederInitialIndependentDataEvent;
use Modules\Workspace\App\Listeners\WorkspaceUserCreatedListener;
use Modules\Workspace\Listeners\WorkspaceInitialIndependentSeederDataListener;

class WorkspaceEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserCreatedEvent::class => [WorkspaceUserCreatedListener::class],
        BaseSeederInitialIndependentDataEvent::class => [WorkspaceInitialIndependentSeederDataListener::class],
    ];
}
