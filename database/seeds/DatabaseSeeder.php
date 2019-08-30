<?php

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
        $this->call(EmployeeSeedTable::class);
        $this->call(DepartmentSeedTable::class);
        $this->call(PositionSeedTable::class);
        $this->call(RoleSeedTable::class);
        $this->call(ShiftSeedTable::class);
        $this->call(WorkHourSeedTable::class);
        $this->call(WorkDaySeedTable::class);
    }
}
