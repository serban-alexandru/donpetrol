<?php

use Illuminate\Database\Seeder;
use App\WeekDay;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $day = new WeekDay;
        $day->name = 'Monday';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'Tuesday';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'Wednesday';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'Thursday';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'Friday';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'Saturday';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'Sunday';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

    }
}
