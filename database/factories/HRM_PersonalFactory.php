<?php

namespace Database\Factories;

use App\Models\HRM_Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

class HRM_PersonalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HRM_Personal::class;

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
            'Employee_ID' => $this->faker->randomNumber(2),
            'First_Name' => $this->faker->firstName,
            'Last_Name' => $this->faker->lastName,
            'Birthday' => $this->faker->date('Y-m-d', '2000-12-31'),
            'Address1' => $this->faker->streetAddress(),
            'City' => $this->faker->city,
            'State' => $this->faker->state,
            'Zip' => '10000',
            'Email' => $this->faker->email,
            'Phone_Number' => $this->faker->e164PhoneNumber,
            'Gender' => rand(0, 1),
            'Shareholder_Status' => rand(0, 1),
            'Ethnicity' => $this->faker->words(2, true),
            'Birthday' => $this->faker->dateTimeThisCentury()
            'Benefits' => $benefits,
            'Benefits_old' => $benefits_old,
        ];
    }
}
