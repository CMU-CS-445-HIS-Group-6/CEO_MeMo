<?php

namespace Database\Seeders;

use DateTime;
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
        \App\Models\HRM_Personal::factory(10)->create()->each(function ($employee) {
            $now = new DateTime();
            $factory = \App\Models\HRM_Employment::factory()->create([
                'Employee_ID' => $employee->Employee_ID,
            ]);
            $hiredate = $factory->Hire_Date;
            $daysTillNow = $now->diff($hiredate)->format('%a');
            $workingDays = rand(0, $daysTillNow); // <= Days from recruiment date
            $paidLastYear = rand(5000, 15000);
            $paidToDays = round($paidLastYear / 365 * $workingDays, 2);
            \App\Models\PR_Employee::factory()->create([
                'idEmployee' => $employee->Employee_ID,
                'FirstName' => $employee->First_Name,
                'LastName' => $employee->Last_Name,
                'PaidToDays' => $paidToDays,
                'PaidLastYear' => $paidLastYear,
            ]);
        });
    }
}
