<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Device;
use App\Models\Type;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        Type::truncate();
        Device::truncate();
        User::truncate();

        $user = User::factory()->create();

        $company1 = Company::factory()->create();
        $company2 = Company::factory()->create();
        $company3 = Company::factory()->create();
        $company4 = Company::factory()->create();
        $company5 = Company::factory()->create();

        $type1 = Type::factory()->create(['value' => 'laptop']);
        $type2 = Type::factory()->create(['value' => 'mobilni telefon']);
        $type3 = Type::factory()->create(['value' => 'tablet']);

        Device::factory(5)->create([
            'company_id' => $company1->id,
            'type_id' => $type1->id,
            'user_id' => $user->id
        ]);

        Device::factory(5)->create([
            'company_id' => $company2->id,
            'type_id' => $type1->id,
            'user_id' => $user->id
        ]);

        Device::factory(5)->create([
            'company_id' => $company3->id,
            'type_id' => $type2->id,
            'user_id' => $user->id
        ]);

        Device::factory(5)->create([
            'company_id' => $company4->id,
            'type_id' => $type2->id,
            'user_id' => $user->id
        ]);

        Device::factory(5)->create([
            'company_id' => $company5->id,
            'type_id' => $type3->id,
            'user_id' => $user->id
        ]);
    }
}
