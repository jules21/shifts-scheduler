<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\TimeTable;
use DB;

class ShiftsController extends Controller
{
    function do() {
        TimeTable::truncate();
        TimeTable::create();

        $assigned = DB::table('time_tables')->get();
        $a = 1;
        $b = 0;
        $row2 = "";
        $array = json_decode(json_encode($assigned), true);
        // print_r($array);
        $j = 1;
        // foreach ($array as $row) {
        //     print $row2 = $row['day'.$j];
        // }
        foreach ($array as $row) {
            for ($i = 1; $i <= 3; $i++) {
                $row['employee_id'] = $i;
                $b = $a;
                for ($j = 1; $j <= 7; $j++) {
                    if ($b > 4) {
                        $b = 1;
                    }
                    $row['day' . $j] = $b;
                    $b++;
                    $a = $b;
                }
                TimeTable::create($row);
                TimeTable::where('id', 1)->delete();
                print_r($row);
            }
        }
    }

    public function build_calendar()
    {
        $dateComponents = getdate();

        $month = $dateComponents['mon'];
        $year = $dateComponents['year'];

        $assigned = DB::table('time_tables')->get();
        $array = json_decode(json_encode($assigned), true);

        // Create array containing abbreviations of days of week.
        $daysOfWeek = array('S', 'M', 'T', 'W', 'T', 'F', 'S');

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

        // How many days does this month contain?
        $numberDays = date('t', $firstDayOfMonth);

        // Retrieve some information about the first day of the
        // month in question.
        $dateComponents = getdate($firstDayOfMonth);

        // What is the name of the month in question?
        $monthName = $dateComponents['month'];

        // What is the index value (0-6) of the first day of the
        // month in question.
        $dayOfWeek = $dateComponents['wday'];

        // Create the table tag opener and day headers

        $calendar = "<table class='calendar table'>";
        $calendar .= "<caption>$monthName $year</caption>";
        $calendar .= "<tr>";

        // Create the calendar headers

        foreach ($daysOfWeek as $day) {
            $calendar .= "<th class='header'>$day</th>";
        }

        // Create the rest of the calendar

        // Initiate the day counter, starting with the 1st.

        $currentDay = 1;

        $calendar .= "</tr><tr>";

        // The variable $dayOfWeek is used to
        // ensure that the calendar
        // display consists of exactly 7 columns.

        if ($dayOfWeek > 0) {
            $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
        }

        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

        while ($currentDay <= $numberDays) {

            // Seventh column (Saturday) reached. Start a new row.

            if ($dayOfWeek == 7) {

                $dayOfWeek = 0;
                $calendar .= "</tr><tr>";

            }

            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

            $date = "$year-$month-$currentDayRel";
            $days = $dayOfWeek + 1;

            $calendar .= "<td class='day' rel='$date'>";
            $calendar .= $currentDay . "<br>";
            foreach ($array as $row) {
                $calendar .= $row['employee_id'] . " : " . $row['day' . $days] . "<br>";
            }
            $calendar .= "</td>";

            // Increment counters

            $currentDay++;
            $dayOfWeek++;
            // break;

        }

        // Complete the row of the last week in month, if necessary

        if ($dayOfWeek != 7) {

            $remainingDays = 7 - $dayOfWeek;
            $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";

        }

        $calendar .= "</tr>";

        $calendar .= "</table>";

        echo $calendar;

    }

    public function print_timetable()
    {
        $dateComponents = getdate();

        $month = $dateComponents['mon'];
        $year = $dateComponents['year'];

        $assigned = DB::table('time_tables')->get();
        $array = json_decode(json_encode($assigned), true);

        // Create array containing abbreviations of days of week.
        $daysOfWeek = array('S', 'M', 'T', 'W', 'T', 'F', 'S');

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

        // How many days does this month contain?
        $numberDays = date('t', $firstDayOfMonth);

        // Retrieve some information about the first day of the
        // month in question.
        $dateComponents = getdate($firstDayOfMonth);

        // What is the name of the month in question?
        $monthName = $dateComponents['month'];

        // What is the index value (0-6) of the first day of the
        // month in question.
        $dayOfWeek = $dateComponents['wday'];

        // Create the table tag opener and day headers

        $calendar = "<table class='calendar table'>";
        $calendar .= "<caption>$monthName $year</caption>";
        $calendar .= "<tr>";

        // Create the calendar headers

        foreach ($daysOfWeek as $day) {
            $calendar .= "<th class='header'>$day</th>";
        }

        // Create the rest of the calendar

        // Initiate the day counter, starting with the 1st.

        $currentDay = 1;

        $calendar .= "</tr><tr>";

        // The variable $dayOfWeek is used to
        // ensure that the calendar
        // display consists of exactly 7 columns.

        if ($dayOfWeek > 0) {
            $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
        }

        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

        while ($currentDay <= $numberDays) {

            // Seventh column (Saturday) reached. Start a new row.

            if ($dayOfWeek == 7) {

                $dayOfWeek = 0;
                $calendar .= "</tr><tr>";

            }

            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

            $date = "$year-$month-$currentDayRel";
            $days = $dayOfWeek + 1;

            $calendar .= "<td class='day' rel='$date'>";
            $calendar .= $currentDay . "<br>";
            foreach ($array as $row) {
                $calendar .= $row['employee_id'] . " : " . $row['day' . $days] . "<br>";
                $data = [
                    "day" => $currentDay,
                    "worker" => $row['employee_id'],
                    "shift" => $row['day' . $days],
                ];

                Calendar::create($data);

            }
            $calendar .= "</td>";

            // Increment counters

            $currentDay++;
            $dayOfWeek++;
            // break;

        }

        // Complete the row of the last week in month, if necessary

        if ($dayOfWeek != 7) {

            $remainingDays = 7 - $dayOfWeek;
            $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";

        }

        $calendar .= "</tr>";

        $calendar .= "</table>";

        echo $calendar;

    }

    public function doCalendars()
    {
        $assigned = DB::table('time_tables')->get();
        // $array = json_decode(json_encode($assigned), true);
        $array = TimeTable::all();

        $dateComponents = getdate();

        $month = $dateComponents['mon'];
        $year = $dateComponents['year'];

        // Create array containing abbreviations of days of week.
        $daysOfWeek = array('S', 'M', 'T', 'W', 'T', 'F', 'S');

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

        // How many days does this month contain?
        $numberDays = date('t', $firstDayOfMonth);

        // Retrieve some information about the first day of the
        // month in question.
        $dateComponents = getdate($firstDayOfMonth);

        // What is the name of the month in question?
        $monthName = $dateComponents['month'];

        // What is the index value (0-6) of the first day of the
        // month in question.
        $dayOfWeek = $dateComponents['wday'];

        $currentDay = 1;

        return view('calendar',
            [
                'array' => $array,
                'month' => $month,
                'year' => $year,
                'daysOfWeek' => $daysOfWeek,
                'firstDayOfMonth' => $firstDayOfMonth,
                'numberDays' => $numberDays,
                'dateComponents' => $dateComponents,
                'monthName' => $monthName,
                'dayOfWeek' => $dayOfWeek,
                'currentDay' => $currentDay,
            ]);
    }
    public function real_timetable()
    {
        $assigned = DB::table('time_tables')->get();
        // $array = json_decode(json_encode($assigned), true);
        $array = TimeTable::all();

        $dateComponents = getdate();

        $month = $dateComponents['mon'];
        $year = $dateComponents['year'];

        // Create array containing abbreviations of days of week.
        $daysOfWeek = array('S', 'M', 'T', 'W', 'T', 'F', 'S');

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

        // How many days does this month contain?
        $numberDays = date('t', $firstDayOfMonth);

        // Retrieve some information about the first day of the
        // month in question.
        $dateComponents = getdate($firstDayOfMonth);

        // What is the name of the month in question?
        $monthName = $dateComponents['month'];

        // What is the index value (0-6) of the first day of the
        // month in question.
        $dayOfWeek = $dateComponents['wday'];

        $currentDay = 1;

        return view('realtimetable',
            [
                'array' => $array,
                'month' => $month,
                'year' => $year,
                'daysOfWeek' => $daysOfWeek,
                'firstDayOfMonth' => $firstDayOfMonth,
                'numberDays' => $numberDays,
                'dateComponents' => $dateComponents,
                'monthName' => $monthName,
                'dayOfWeek' => $dayOfWeek,
                'currentDay' => $currentDay,
            ]);
    }

}
