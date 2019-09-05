<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions =
        [
        ['id' => '1', 'name' => 'manager','department_id'=>'1'],
        ['id' => '2', 'name' => 'employee','department_id'=>'1'],
        ['id' => '3', 'name' => 'manager','department_id'=>'2'],
        ['id' => '4', 'name' => 'employee','department_id'=>'2'],
    ];
    foreach ($positions as $position) {
        Position::create($position);
    }
    }
}
