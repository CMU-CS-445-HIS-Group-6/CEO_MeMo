<?php

namespace Database\Factories;

use App\Models\PR_Payroll;
use Illuminate\Database\Eloquent\Factories\Factory;

class PR_PayrollFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PR_Payroll::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paidLastYear = rand(5000, 15000);

        return [
            'WorkingDays' => $this->faker->numberBetween(0, 400),
            'PaidToDays' => rand($paidLastYear, $paidLastYear * 3),
            'PaidLastYear' => $paidLastYear,
        ];
    }
}
