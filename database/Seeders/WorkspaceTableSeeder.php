<?php

declare(strict_types=1);

namespace Modules\Workspace\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Person\Models\PersonModel;
use Modules\Workspace\Models\WorkspaceModel;

final class WorkspaceTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->seeding();

        $superAdmin = User::query()->where('type_id', 2)->get()->first();

        WorkspaceModel::factory(3)
            ->for($superAdmin)
            ->sequence(
                ['name' => str(__('personal'))->ucfirst()],
                ['name' => str(__('customers'))->ucfirst()],
                ['name' => str(__('work'))->ucfirst()]
            )
            ->afterCreating(function (WorkspaceModel $workspace): void {
                $persons = PersonModel::factory(2)->create()
                    ->map(fn ($person) => [
                        'person_id' => $person->id,
                        'name' => $person->name,
                    ]);
                $modelKeys = User::factory(2)
                    ->sequence(...$persons)
                    ->create()->modelKeys();
                $workspace->participants()->attach([
                    $workspace->user_id, ...$modelKeys,
                ]);
            })
            ->create();

        $this->done();
    }
}
