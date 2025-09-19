<?php

declare(strict_types=1);

namespace Modules\Workspace\Tests\Feature;

trait WorkspaceValidations
{
    //    public function validatesUserIdAsRequired()
    //    {
    //        $this->postJson($this->getRoute(), [
    //            'user_id' => null
    //        ])
    //            ->assertStatus(422)
    //            ->assertJsonValidationErrors(['user_id' =>
    //                [__('validation.required', ['attribute' => 'user id'])]
    //            ]);
    //    }

    //    public function validatesUserIdAsInteger()
    //    {
    //        $this->postJson($this->getRoute(), ['user_id' => 's'])
    //            ->assertStatus(422)
    //            ->assertJsonValidationErrors(['user_id' =>
    //                [__('validation.integer', ['attribute' => 'user id'])]
    //            ]);
    //    }

    public function validatesNameAsRequired(): void
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => null,
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name' => [__('validation.required', ['attribute' => 'name'])],
            ]);
    }

    public function validatesNameAsString(): void
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => 1,
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name' => [__('validation.string', ['attribute' => 'name'])],
            ]);
    }

    public function validatesNameMinLength(): void
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => 'a',
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name' => [__('validation.min.string', ['attribute' => 'name', 'min' => 2])],
            ]);
    }

    public function validatesNameMaxLength(): void
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => str('a')->padRight(201, 'a'),
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name' => [__('validation.max.string', ['attribute' => 'name', 'max' => 200])],
            ]);
    }

    public function validatesDescriptionAsString(): void
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => 1,
            'description' => 1,
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['description' => [__('validation.string', ['attribute' => 'description'])],
            ]);
    }

    public function validatesDescriptionMaxLength(): void
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'description' => str('a')->padRight(201, 'a'),
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['description' => [__('validation.max.string', ['attribute' => 'description', 'max' => 200])],
            ]);
    }
}
