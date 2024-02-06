<?php

namespace Modules\Workspace\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\Workspace\App\Providers\WorkspaceEventServiceProvider;
use Modules\Workspace\Http\Livewire\Form\WorkspaceForm;
use Modules\Workspace\Http\Livewire\Pages\WorkspaceChatPage;
use Modules\Workspace\Http\Livewire\Pages\WorkspaceLinkPage;
use Modules\Workspace\Http\Livewire\Pages\WorkspaceParticipantPage;
use Modules\Workspace\Http\Livewire\Pages\WorkspacePostPage;
use Modules\Workspace\Http\Livewire\Pages\WorkspacesPage;
use Modules\Workspace\Http\Livewire\WorkspaceChatTable;
use Modules\Workspace\Http\Livewire\WorkspaceLinkTable;
use Modules\Workspace\Http\Livewire\WorkspaceParticipantTable;
use Modules\Workspace\Http\Livewire\WorkspacePostTable;
use Modules\Workspace\Http\Livewire\WorkspaceProjectTable;
use Modules\Workspace\Http\Livewire\WorkspaceTable;
use Modules\Workspace\Http\Livewire\WorkspaceTagTable;

class WorkspaceServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Workspace';

    /**
     * @var string $moduleNameLower
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
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('workspace::form', WorkspaceForm::class);
        Livewire::component('workspace::page.link', WorkspaceLinkPage::class);
        Livewire::component('workspace::page.participant', WorkspaceParticipantPage::class);
        Livewire::component('workspace::page.chat', WorkspaceChatPage::class);
        Livewire::component('workspace::page.post', WorkspacePostPage::class);
        Livewire::component('workspace::page.list', WorkspacesPage::class);
        Livewire::component('workspace::chat-table', WorkspaceChatTable::class);
        Livewire::component('workspace::link-table', WorkspaceLinkTable::class);
        Livewire::component('workspace::participant-table', WorkspaceParticipantTable::class);
        Livewire::component('workspace::post-table', WorkspacePostTable::class);
        Livewire::component('workspace::project-table', WorkspaceProjectTable::class);
        Livewire::component('workspace::table', WorkspaceTable::class);
        Livewire::component('workspace::tag-table', WorkspaceTagTable::class);

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(WorkspaceEventServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
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

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
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
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
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
}
