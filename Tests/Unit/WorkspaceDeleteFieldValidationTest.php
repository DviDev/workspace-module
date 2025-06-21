<?php

namespace Modules\Workspace\Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Workspace\Models\WorkspaceModel;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class WorkspaceDeleteFieldValidationTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    #[Test]
    public function delete_id_required()
    {
        $this->postJson(route('workspace.delete'), [
            'id' => null,
        ])->assertStatus(422);
    }

    #[Test]
    public function delete_id_string()
    {
        $this->postJson(route('workspace.delete'), [
            'id' => 'a',
        ])->assertStatus(422)
            ->assertJsonValidationErrors(['id' => __('validation.integer', ['attribute' => 'id'])]);
    }

    #[Test]
    public function delete_with_invalid_id()
    {
        $this->postJson(route('workspace.delete'), [
            'id' => '1.000.000.000.000.000.000.000.000',
        ])->assertStatus(422);
    }

    #[Test]
    public function delete_with_valid_id()
    {
        /** @var WorkspaceModel $workspace */
        $workspace = WorkspaceModel::factory()->create();

        $this->postJson(route('workspace.delete'), [
            'id' => $workspace->id,
        ])->assertOk();
    }
}
