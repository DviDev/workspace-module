<?php

namespace Modules\Workspace\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Workspace\Models\WorkspaceModel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class WorkspaceStoreFieldValidationTest extends TestCase
{
//    use DatabaseMigrations;
//    use DatabaseTransactions;
    use RefreshDatabase;
    use WorkspaceValidations;

    protected WorkspaceModel $workspace;

    protected function setUp(): void
    {
        parent::setUp();

        $this->workspace = WorkspaceModel::factory()->create();
    }

    /**
     * @test
     */
    public function storeWithInvalidParentId()
    {
        $user = User::factory()->create();
        $this->postJson($this->getRoute(), [
            'user_id' => $user->id,
            'parent_id' => 1000000000000,
            'name' => 'aa',
            'description' => 'aa'
        ])
            ->assertStatus(404)
            ->assertJsonFragment(['exception' => NotFoundHttpException::class]);
    }

    /**
     * @test
     */
    public function storeWithInvalidName()
    {
        $this->actingAs(User::factory()->create());
        $this->postJson($this->getRoute(), [
            'parent_id' => 1,
            'name' => '',
            'description' => 'aa'
        ])
            ->assertStatus(422)
            ->assertJsonFragment(['name' => ["The name field is required.","The name field must be a string."]]);
    }

    protected function getRoute(): string
    {
        return route('workspace.store');
    }

}
