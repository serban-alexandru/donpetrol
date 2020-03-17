<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WeekDay;
use Validator;

class ScheduleController extends Controller
{
    
    public function index(){

        $weekdays = WeekDay::all();

        return view('admin.schedule')->with([
            'weekdays' => $weekdays,
        ]);

    }

    public function edit(Request $request, $day_id){

        $day = WeekDay::find($day_id);

        if($day){

            $validator = Validator::make($request->all(), [
                'hour_start' => 'required|numeric|min:0|max:23',
                'minutes_start' => 'required|numeric|min:0|max:59',
                'hour_end' => 'required|numeric|min:0|max:23',
                'minutes_end' => 'required|numeric|min:0|max:59',
            ]);

            if($validator->fails()){
                return redirect()->back()->with('error', 'Invalid data sent');
            }

            $day->hour_start = $request->hour_start ;
            $day->minutes_start = $request->minutes_start ;
            $day->hour_end = $request->hour_end ;
            $day->minutes_end = $request->minutes_end ;
            $day->save();

            return redirect()->back()->with('success', 'Success');

        }

        return redirect()->back()->with('error', 'Invalid data sent');

    }

}
