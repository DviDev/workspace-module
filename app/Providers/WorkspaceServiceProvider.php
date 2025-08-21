<?php

namespace Modules\Workspace\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\Base\Events\BaseSeederInitialIndependentDataEvent;
use Modules\DBMap\Events\ScanTableEvent;
use Modules\View\Events\ElementPropertyCreatedEvent;
use Modules\Workspace\Console\DisableUnecessaryModulesCommand;
use Modules\Workspace\Console\TestWorkspaceModuleCommand;
use Modules\Workspace\Http\Livewire\Form\WorkspaceForm;
use Modules\Workspace\Listeners\TranslateViewElementPropertiesListener;
use Modules\Workspace\Listeners\WorkspaceInitialIndependentSeederDataListener;
use Modules\Workspace\Listeners\WorkspaceScanTableListener;
use Illuminate\Support\Facades\Event;
use Modules\Person\Events\UserCreatedEvent;
use Modules\Project\Events\CreateMenuItemsEvent;
use Modules\Project\Events\EntityAttributesCreatedEvent;
use Modules\Workspace\Listeners\CreateMenuItemsListener;
use Modules\Workspace\Listeners\DefineSearchableAttributes;
use Modules\Workspace\Listeners\WorkspaceUserCreatedListener;

class WorkspaceServiceProvider extends ServiceProvider
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
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'database/Migrations'));
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath);
            return;
        }
        $this->loadTranslationsFrom(module_path($this->moduleName, 'lang'), $this->moduleNameLower);
        $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'lang'));
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'resources/views');

        $this->publishes([
            $sourcePath => $viewPath,
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }

        return $paths;
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('workspace::form', WorkspaceForm::class);

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(WorkspaceEventServiceProvider::class);

        Event::listen(BaseSeederInitialIndependentDataEvent::class, WorkspaceInitialIndependentSeederDataListener::class);
        Event::listen(ScanTableEvent::class, WorkspaceScanTableListener::class);
        Event::listen(ElementPropertyCreatedEvent::class, TranslateViewElementPropertiesListener::class);

        Event::listen(UserCreatedEvent::class, WorkspaceUserCreatedListener::class);
        Event::listen(BaseSeederInitialIndependentDataEvent::class, WorkspaceInitialIndependentSeederDataListener::class);
        Event::listen(CreateMenuItemsEvent::class, CreateMenuItemsListener::class);
        Event::listen(EntityAttributesCreatedEvent::class, DefineSearchableAttributes::class);

        $this->commands(TestWorkspaceModuleCommand::class);
        $this->commands(DisableUnecessaryModulesCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
