<?php

declare(strict_types=1);

namespace Modules\Workspace\Providers;

use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use Modules\Base\Contracts\BaseServiceProviderContract;
use Modules\Base\Events\SeedInitialIndependentDataEvent;
use Modules\DBMap\Events\ScanTableEvent;
use Modules\Person\Events\UserCreatedEvent;
use Modules\Project\Events\CreateMenuItemsEvent;
use Modules\View\Events\DefineSearchableAttributesEvent;
use Modules\View\Events\ElementPropertyCreatingEvent;
use Modules\Workspace\Console\DisableUnecessaryModulesCommand;
use Modules\Workspace\Console\TestWorkspaceModuleCommand;
use Modules\Workspace\Http\Livewire\Form\WorkspaceForm;
use Modules\Workspace\Listeners\CreateMenuItemsListener;
use Modules\Workspace\Listeners\DefineSearchableAttributes;
use Modules\Workspace\Listeners\SeederInitialIndependentSeederDataWorkspaceListener;
use Modules\Workspace\Listeners\TranslateViewElementPropertiesListener;
use Modules\Workspace\Listeners\WorkspaceScanTableListener;
use Modules\Workspace\Listeners\WorkspaceUserCreatedListener;

final class WorkspaceServiceProvider extends BaseServiceProviderContract
{
    /**
     * @var string
     */
    protected $moduleName = 'Workspace';

    /**
     * @var string
     */
    protected $moduleNameLower = 'workspace';

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [
            RouteServiceProvider::class,
            WorkspaceEventServiceProvider::class,
        ];
    }

    public function getModuleName(): string
    {
        return 'Workspace';
    }

    public function getModuleNameLower(): string
    {
        return 'workspace';
    }

    public function requireModules(): array
    {
        return [
        ];
    }

    protected function registerEvents(): void
    {
        Event::listen(SeedInitialIndependentDataEvent::class, SeederInitialIndependentSeederDataWorkspaceListener::class);
        Event::listen(ScanTableEvent::class, WorkspaceScanTableListener::class);
        Event::listen(ElementPropertyCreatingEvent::class, TranslateViewElementPropertiesListener::class);

        Event::listen(UserCreatedEvent::class, WorkspaceUserCreatedListener::class);
        Event::listen(CreateMenuItemsEvent::class, CreateMenuItemsListener::class);
        Event::listen(DefineSearchableAttributesEvent::class, DefineSearchableAttributes::class);
    }

    protected function registerCommands(): void
    {
        $this->commands([
            TestWorkspaceModuleCommand::class,
            DisableUnecessaryModulesCommand::class,
        ]);
    }

    protected function registerComponents(): void
    {
        Livewire::component('workspace::form', WorkspaceForm::class);
    }
}
