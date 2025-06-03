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
    public function deleteIdRequired()
    {
        $this->postJson(route('workspace.delete'), [
            'id' => null
        ])->assertStatus(422);
    }

    #[Test]
    public function deleteIdString()
    {
        $this->postJson(route('workspace.delete'), [
            'id' => 'a'
        ])->assertStatus(422)
            ->assertJsonValidationErrors(['id' => __('validation.integer', ['attribute' => 'id'])]);
    }

    #[Test]
    public function deleteWithInvalidId()
    {
        $this->postJson(route('workspace.delete'), [
            'id' => '1.000.000.000.000.000.000.000.000'
        ])->assertStatus(422);
    }

    #[Test]
    public function deleteWithValidId()
    {
        /**@var WorkspaceModel $workspace*/
        $workspace = WorkspaceModel::factory()->create();

        $this->postJson(route('workspace.delete'), [
            'id' => $workspace->id
        ])->assertOk();
    }
}
