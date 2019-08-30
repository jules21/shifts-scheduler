<?php

use App\Shift;
use Illuminate\Database\Seeder;

class ShiftSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts =
            [
            ['id' => '1', 'name' => 'morning'],
            ['id' => '2', 'name' => 'noon'],
            ['id' => '3', 'name' => 'night'],

            ['id' => '4', 'name' => 'day'],
            ['id' => '5', 'name' => 'evening'],

            ['id' => '6', 'name' => 'off'],
        ];
        foreach ($shifts as $shift) {
            Shift::create($shift);
        }
    }
}
