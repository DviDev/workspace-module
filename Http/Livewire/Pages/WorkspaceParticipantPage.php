<?php

namespace Modules\Workspace\Http\Livewire\Pages;

use Livewire\Component;
use Modules\Workspace\Models\WorkspaceModel;

class WorkspaceParticipantPage extends Component
{
    public WorkspaceModel $workspace;

    public function render()
    {
        return view('livewire.pages.workspace.workspace-participant-page');
    }
}
