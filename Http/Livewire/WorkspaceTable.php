<?php

namespace Modules\Workspace\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Modules\Workspace\Models\WorkspaceModel;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Detail,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\Rules\{RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class WorkspaceTable extends PowerGridComponent
{
    use ActionButton;

    public $name;

    protected $listeners = ['refresh' => '$refresh'];

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Header::make()
                ->showSearchInput()->showToggleColumns(),
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            Detail::make()
                ->view('workspace::components.list_detail')
                ->showCollapseIcon(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\Modules\Workspace\Models\WorkspaceModel>
     */
    public function datasource(): Builder
    {
        return WorkspaceModel::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('name_lower', fn(WorkspaceModel $model) => strtolower(e($model->name)))
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', fn(WorkspaceModel $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Name', 'name')
                ->searchable()->toggleable()
                ->sortable()->clickToCopy(true, 'name')->editOnClick(),

            Column::make('Created at', 'created_at')
                ->hidden(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->searchable(),


        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('name'),
            Filter::datepicker('created_at_formatted', 'created_at'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid WorkspaceModel Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::add('custom')
                ->render(function (WorkspaceModel $workspace) {
                    return Blade::render(<<<HTML
                      <div class="flex">
                          <a href="{{ route('admin.workspace.edit', $workspace->id) }}" class="bg-indigo-500
                            cursor-pointer
                            text-white px-2 py-2 mr-1 rounded rounded-full text-sm">
                            <x-dvui::icon.pencil/>
                          </a>
                          <button type="button" wire:click="remove('$workspace->id')" class="bg-red-500 cursor-pointer
                              text-white px-2 py-2 rounded rounded-full text-sm">
                              <x-dvui::icon.trash/>
                          </button>
                    </div>
                    HTML
                    );
                }),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid WorkspaceModel Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($workspace-model) => $workspace-model->id === 1)
                ->hide(),
        ];
    }
    */

    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        $w = WorkspaceModel::query()->find($id);
        $w->setAttribute($field, $value);
        $w->save();
    }

    public function remove(WorkspaceModel $workspace)
    {
        try {
            $workspace->delete();
            $this->dispatch('refresh')->self();
        } catch (\Exception $exception) {
            if ($exception->getCode() == '23000') {
                throw new \Exception('Não é possível excluir workspaces');
            }
        }

    }
}
