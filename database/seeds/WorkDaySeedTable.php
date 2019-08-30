<?php

use App\WorkDay;
use Illuminate\Database\Seeder;

class WorkDaySeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days =
            [
            ['id' => '1', 'day' => 'Monday'],
            ['id' => '2', 'day' => 'Tuesday'],
            ['id' => '3', 'day' => 'Wednesday'],
            ['id' => '4', 'day' => 'Thursday'],
            ['id' => '5', 'day' => 'Friday'],
            ['id' => '6', 'day' => 'Saturday'],
            ['id' => '7', 'day' => 'Sunday'],
        ];
        foreach ($days as $day) {
            WorkDay::create($day);
        }
    }
}
