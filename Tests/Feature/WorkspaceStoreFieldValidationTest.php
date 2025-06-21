<?php

namespace Modules\Workspace\Tests\Feature;

use App\Models\User;
use Modules\Workspace\Models\WorkspaceModel;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class WorkspaceStoreFieldValidationTest extends TestCase
{
    //    use DatabaseMigrations;
    //    use DatabaseTransactions;
    //    use RefreshDatabase;
    use WorkspaceValidations;

    protected WorkspaceModel $workspace;

    protected function setUp(): void
    {
        parent::setUp();

        $this->workspace = WorkspaceModel::factory()->create();
    }

    #[Test]
    public function test_store_with_invalid_parent_id()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $this->actingAs($user);
        $workspace = WorkspaceModel::factory()->create();
        $this->post('workspace/form/'.$workspace->id)
            ->assertStatus(200);
        //            ->assertStatus(404)
        //            ->assertJsonFragment(['exception' => NotFoundHttpException::class]);
    }

    #[Test]
    public function store_with_invalid_name()
    {
        $this->actingAs(User::factory()->create());
        $this->postJson($this->getRoute(), [
            'parent_id' => 1,
            'name' => '',
            'description' => 'aa',
        ])
            ->assertStatus(422)
            ->assertJsonFragment(['name' => ['The name field is required.', 'The name field must be a string.']]);
    }

    protected function getRoute(): string
    {
        return route('workspace.form');
    }
}
