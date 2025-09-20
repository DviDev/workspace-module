<?php

declare(strict_types=1);

namespace Modules\Workspace\Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Tests\Feature\WorkspaceValidations;
use Tests\TestCase;

final class WorkspaceUpdateFieldValidationTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    use WorkspaceValidations;

    /**
     * @var WorkspaceModel
     */
    protected mixed $workspace;

    /**
     * @var User
     */
    protected mixed $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
        $this->workspace = WorkspaceModel::factory()->create(['user_id' => $this->user->id]);
    }

    public function getRoute()
    {
        return route('workspace.update');
    }

    #[Test]
    public function loggedUserShouldBeOwner()
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => 'bla',
        ])->assertOk();
    }

    #[Test]
    public function loggedUserDontShouldBeOwner()
    {
        $this->actingAs(User::factory()->create());
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => 'blabla',
        ])->assertStatus(403);
    }
}
