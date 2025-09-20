<?php

declare(strict_types=1);

use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;

// uses(TestCase::class)->in(__DIR__);

it('should be owner', function (): void {
    $p = WorkspaceEntityModel::props();
    $model = WorkspaceModel::factory()->create();
    $this->actingAs($model->user);
    $data = [
        $p->id => $model->id,
        $p->name => $model->name.'_updated',
    ];
    $this->post(route('workspace.update'), $data)->assertOk();
});

todo('should be logged');

todo('should be owner');
