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
        \App\Models\HRM_Employee::factory(10)->create()->each(function ($employee) {
            $now = new DateTime();
            $daysTillNow = $now->diff($employee->RecruitmentDate)->format('%a');
            $workingDays = rand(0, $daysTillNow); // <= Days from recruiment date
            $paidLastYear = rand(5000, 15000);
            $paidToDays = round($paidLastYear / 365 * $workingDays, 2);
            \App\Models\PR_Employee::factory()->create([
                'FirstName' => $employee->FirstName,
                'LastName' => $employee->LastName,
                'WorkingDays' => $workingDays,
                'PaidToDays' => $paidToDays,
                'PaidLastYear' => $paidLastYear,
            ]);
        });
    }
}
