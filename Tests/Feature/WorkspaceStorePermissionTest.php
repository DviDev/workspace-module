<?php

use App\Models\User;
use Modules\Workspace\Entities\Workspace\WorkspaceEntityModel;
use Modules\Workspace\Models\WorkspaceModel;
use Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

it('not allow unauthenticated user', function () {
    $p = WorkspaceEntityModel::props();
    $this->post(route('workspace.store'), [$p->parent_id => 10000])
        ->assertStatus(403);
});

it('allow auth user', function () {
    $p = WorkspaceEntityModel::props();
    $arr = [
        $p->name => fake()->word(),
        $p->description => fake()->sentence(),
    ];
    $this->actingAs(User::factory()->create())
        ->post(route('workspace.store'), $arr)
        ->assertOk();
});

test('the parent_id must be invalid', function () {
    $p = WorkspaceEntityModel::props();
    $r = $this->actingAs(User::factory()->create());
    $r->post(route('workspace.store'), [
        $p->name => fake()->words(2, true),
        $p->parent_id => 1000000000000,
    ])->assertInvalid([
        $p->parent_id => 'The selected parent id is invalid',
    ]);
    $arr = [
        $p->name => fake()->words(2, true),
        $p->parent_id => WorkspaceModel::factory()->create()->id,
    ];
    $r->post(route('workspace.store'), $arr)->assertOk();
});

it('shout be avoid name < 2 characters', function () {
    $p = WorkspaceEntityModel::props();
    $arr = [
        $p->name => 'a',
        $p->description => fake()->sentence(),
    ];
    $this->actingAs(User::factory()->create())
        ->post(route('workspace.store'), $arr)
        ->assertInvalid(['name' => 'The name field must be at least 2 characters.']);
});

it('must not be greater than 100 characters', function () {
    $p = WorkspaceEntityModel::props();
    $arr = [
        $p->name => str_pad('a', 101, 'a'),
        $p->description => fake()->sentence(),
    ];
    $this->actingAs(User::factory()->create())
        ->post(route('workspace.store'), $arr)
        ->assertInvalid(['name' => 'The name field must not be greater than 100 characters.']);
});

it('should be have a required name', function () {
    $p = WorkspaceEntityModel::props();
    $arr = [
        $p->name => null,
        $p->description => fake()->sentence(),
    ];
    $this->actingAs(User::factory()->create())
        ->post(route('workspace.store'), $arr)
        ->assertInvalid(['name' => 'The name field is required.']);
});

it('The name field must be a string.', function () {
    $p = WorkspaceEntityModel::props();
    $arr = [
        $p->name => null,
        $p->description => fake()->sentence(),
    ];
    $this->actingAs(User::factory()->create())
        ->post(route('workspace.store'), $arr)
        ->assertInvalid(['name' => 'The name field must be a string.']);
});

test('The description field must be a string.', function () {
    $p = WorkspaceEntityModel::props();
    $r = $this->actingAs(User::factory()->create());
    $r->post(route('workspace.store'), [
        $p->name => fake()->words(3, true),
        $p->description => 2,
    ])->assertInvalid([$p->description => "The $p->description field must be a string."]);

    $r->post(route('workspace.store'), [
        $p->name => fake()->words(3, true),
        $p->description => fake()->sentence(),
    ])->assertOk();
});
