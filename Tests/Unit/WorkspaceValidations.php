<?php

namespace Modules\Workspace\Tests\Unit;

trait WorkspaceValidations
{
    /**
     * @test
     */
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

    /**
     * @test
     */
//    public function validatesUserIdAsInteger()
//    {
//        $this->postJson($this->getRoute(), ['user_id' => 's'])
//            ->assertStatus(422)
//            ->assertJsonValidationErrors(['user_id' =>
//                [__('validation.integer', ['attribute' => 'user id'])]
//            ]);
//    }

    /**
     * @test
     */
    public function validatesNameAsRequired()
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => null,
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name' =>
                [__('validation.required', ['attribute' => 'name'])]
            ]);
    }

    /**
     * @test
     */
    public function validatesNameAsString()
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => 1,
            ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name' =>
                [__('validation.string', ['attribute' => 'name'])]
            ]);
    }

    /**
     * @test
     */
    public function validatesNameMinLength()
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => 'a'
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name' =>
                [__('validation.min.string', ['attribute' => 'name', 'min' => 2])]
            ]);
    }

    /**
     * @test
     */
    public function validatesNameMaxLength()
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => str('a')->padRight(201, 'a')
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name' =>
                [__('validation.max.string', ['attribute' => 'name', 'max' => 200])]
            ]);
    }

    /**
     * @test
     */
    public function validatesDescriptionAsString()
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'name' => 1,
            'description' => 1,
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['description' =>
                [__('validation.string', ['attribute' => 'description'])]
            ]);
    }

    /**
     * @test
     */
    public function validatesDescriptionMaxLength()
    {
        $this->postJson($this->getRoute(), [
            'id' => $this->workspace->id,
            'description' => str('a')->padRight(201, 'a')
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['description' =>
                [__('validation.max.string', ['attribute' => 'description', 'max' => 200])]
            ]);
    }
}
