<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments =
            [
            ['id' => '1', 'name' => 'Front office'],
            ['id' => '2', 'name' => 'F&B Service'],
            ['id' => '3', 'name' => 'Kitchen'],
            ['id' => '4', 'name' => 'Housekeeping'],
            ['id' => '5', 'name' => 'Maintenance'],
            ['id' => '6', 'name' => 'Housekeeping'],
        ];
        foreach ($departments as $department) {
            Department::create($department);
        }

    }
}
