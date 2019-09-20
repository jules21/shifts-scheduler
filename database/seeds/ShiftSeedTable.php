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
            // ['id' => '1', 'name' => 'morning', ],
            // ['id' => '2', 'name' => 'noon', ],
            // ['id' => '3', 'name' => 'night', ],

            // ['id' => '4', 'name' => 'day', ],
            // ['id' => '5', 'name' => 'evening', ],

            // ['id' => '6', 'name' => 'off', ],

            ['id' => '1', 'name' => 'day off', 'abbr' => 'O'],
            ['id' => '2', 'name' => 'morning', 'abbr' => 'M'],
            ['id' => '3', 'name' => 'noon ', 'abbr' => 'N'],
            ['id' => '4', 'name' => 'evening', 'abbr' => 'E'],

        ];
        foreach ($shifts as $shift) {
            Shift::create($shift);
        }
    }
}
