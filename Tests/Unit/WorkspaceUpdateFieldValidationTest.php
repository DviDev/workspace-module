<?php

namespace Modules\Workspace\Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class WorkspaceUpdateFieldValidationTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    use WorkspaceValidations;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function getRoute()
    {
        return route('workspace.update');
    }

    /** @test */
    public function validatesIdAsRequired()
    {
        $this->postJson($this->getRoute(), [
            'id' => null
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['id' =>
                [__('validation.required', ['attribute' => 'id'])]
            ]);
    }

    /** @test */
    public function validatesIdAsInteger()
    {
        $this->postJson($this->getRoute(), [
            'id' => 'a'
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['id' =>
                [__('validation.integer', ['attribute' => 'id'])]
            ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $this->postJson($this->getRoute(), [
            'id' => null
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['id' => __('validation.required', ['attribute' => 'id'])]);
    }
}
