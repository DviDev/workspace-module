<?php

namespace Modules\Workspace\Tests\Feature;

use PHPUnit\Framework\Attributes\Test;

trait WorkspaceValidations
{
    #[Test]
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

    #[Test]
    //    public function validatesUserIdAsInteger()
    //    {
    //        $this->postJson($this->getRoute(), ['user_id' => 's'])
    //            ->assertStatus(422)
    //            ->assertJsonValidationErrors(['user_id' =>
    //                [__('validation.integer', ['attribute' => 'user id'])]
    //            ]);
    //    }

    #[Test]
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

    #[Test]
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

    #[Test]
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

    #[Test]
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

    #[Test]
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

    #[Test]
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
