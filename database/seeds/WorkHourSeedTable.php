<?php

use App\WorkHour;
use Illuminate\Database\Seeder;

class WorkHourSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workHours =
            [
            ['id' => '1', 'start_time' => '07:00', 'end_time' => '15:00', 'shift_id' => '1'],
            ['id' => '2', 'start_time' => '15:00', 'end_time' => '23:00', 'shift_id' => '2'],
            ['id' => '3', 'start_time' => '23:00', 'end_time' => '07:00', 'shift_id' => '3'],

            ['id' => '4', 'start_time' => '07:00', 'end_time' => '18:00', 'shift_id' => '4'],
            ['id' => '5', 'start_time' => '18:00', 'end_time' => '07:00', 'shift_id' => '5'],
        ];

        foreach ($workHours as $workHour) {
            WorkHour::create($workHour);
        }
    }
}
