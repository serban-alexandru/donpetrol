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
        $day->name = 'maandag';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'dinsdag';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'woensdag';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'donderdag';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'vrijdag';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'zaterdag';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

        $day = new WeekDay;
        $day->name = 'zondag';
        $day->hour_start = '09';
        $day->minutes_start = '00';
        $day->hour_end = '15';
        $day->minutes_end = '00';
        $day->save();

    }
}
