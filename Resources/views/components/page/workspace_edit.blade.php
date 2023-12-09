<x-lte::layout.v1.page>
    <x-lte::card.header>
        <div class="flex border grow justify-between px-2">
            <div class="font-semibold text-blue-500 text-lg my-auto">
                Workspace
            </div>
            <a href="" class="border rounded p-2 my-auto" title="Builder">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </x-lte::card.header>
    <x-lte::card.body>
        <livewire:workspace::form
            :model="$workspace"
            :page="\Modules\View\Models\ModuleEntityPageModel::where('name', 'Workspaces Form')->first()"/>
    </x-lte::card.body>
</x-lte::layout.v1.page>
