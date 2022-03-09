<?php

namespace Modules\Workspace\Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Workspace\Models\WorkspaceModel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class WorkspaceStoreFieldValidationTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    use WorkspaceValidations;

    /**
     * @test
     */
    public function storeWithInvalidUserId()
    {
        $this->postJson($this->getRoute(), [
            'user_id' => 1000000000,
            'parent_id' => 1,
            'name' => 'aa',
            'description' => 'aa'
        ])
            ->assertStatus(404)
            ->assertJsonFragment(['exception' => NotFoundHttpException::class]);
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

    protected function getRoute(): string
    {
        return route('workspace.store');
    }

}
