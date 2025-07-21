@php use Modules\Workspace\Models\WorkspaceModel; @endphp
<x-dvui::layouts.page title="Workspaces">
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <th style="width: 5%">Id</th>
            <th>Nome</th>
            <th style="width: 10%">#</th>
        </tr>
        </thead>
        <tbody>
        @foreach($workspaces = WorkspaceModel::paginate() as $workspace)
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
</x-dvui::layouts.page>
