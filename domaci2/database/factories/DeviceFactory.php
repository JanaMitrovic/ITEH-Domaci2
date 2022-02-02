<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Device;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class DeviceFactory extends Factory
{
    protected $model = Device::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'origin' => $this->faker->country(),
            'company_id' => Company::factory(),
            'type_id' => Type::factory(),
            'user_id' => User::factory()
        ];
    }
}
