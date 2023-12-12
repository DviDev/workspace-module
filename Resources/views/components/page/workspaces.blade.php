<x-lte::layout.v1.page title="Workspaces">
    <x-lte::card.body>
        <table>
            <thead>
            <tr>
                <th style="width: 5%">Id</th>
                <th>Nome</th>
                <th style="width: 10%">#</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workspaces = \Modules\Workspace\Models\WorkspaceModel::paginate() as $workspace)
                <tr>
                    <td>{{$workspace->id}}</td>
                    <td>{{$workspace->name}}</td>
                    <td>
                        <div>
                            <a href="{{route('workspace.form', $workspace->id)}}"
                               class="bg-green-600 px-2 py-1 rounded text-white">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </x-lte::card.body>

    {{--    <livewire:workspace.workspace-table/>--}}
</x-lte::layout.v1.page>
