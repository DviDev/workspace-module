<div class="dark:text-gray-200 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link text="projects" :url="route('admin.workspace.projects', $row->id)" white class=" rounded-l-md px-2 pl-3 py-1"/>
        <x-dvui::link text="posts" :url="route('admin.workspace.posts', $row->id)" white class=" px-2 py-1"/>
        <x-dvui::link text="links" :url="route('admin.workspace.links', $row->id)" white class="px-2 py-1"/>
        <x-dvui::link text="participants" :url="route('admin.workspace.participants', $row->id)" white class="px-2 py-1"/>
        <x-dvui::link text="chats" :url="route('admin.workspace.chats', $row->id)" white class="px-2 py-1"/>
        <x-dvui::link text="social" :url="route('admin.social.groups', $row->id)" white class="px-2 py-1"/>
        <x-dvui::link text="tags" :url="route('admin.workspace.tags', $row->id)" white class="rounded-r-md px-2 py-1 pr-4"/>
    </x-dvui::button.group>
    <div>Descrição: {{$row->description}}</div>
</div>
