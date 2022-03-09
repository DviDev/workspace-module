<?php

namespace Modules\Workspace\Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class WorkspaceStoreFieldValidationTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    use WorkspaceValidations;

    /**
     * @test
     */
    public function store()
    {
        $this->postJson($this->getRoute(), [
            'user_id' => 1,
            'parent_id' => 1,
            'name' => 'aa',
            'description' => 'aa'
        ])
        ->assertOk()
        ->assertJsonFragment([
            'id' => 1,
            'user_id' => 1,
            'parent_id' => 1,
            'name' => 'aa',
            'description' => 'aa'
        ]);
    }

    protected function getRoute(): string
    {
        return route('workspace.store');
    }

}
