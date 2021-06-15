<?php

namespace Database\Factories;

use App\Models\HRM_Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class HRM_EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HRM_Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $benefits = $this->faker->randomNumber(4);
        $benefits_old = rand(0, 1) == 0 ? 0 : $this->faker->randomNumber(4);

        return [
            'FirstName' => $this->faker->firstName,
            'LastName' => $this->faker->lastName,
            'Gender' => rand(0, 1),
            'Birthday' => $this->faker->date('Y-m-d', '2000-12-31'),
            'Address' => $this->faker->address,
            'Email' => $this->faker->email,
            'PhoneNumber' => $this->faker->e164PhoneNumber,
            'Ethnicity' => $this->faker->words(2, true),
            'RecruitmentDate' => $this->faker->dateTimeThisDecade(),
            'Benefits' => $benefits,
            'Benefits_old' => $benefits_old,
        ];
    }
}
