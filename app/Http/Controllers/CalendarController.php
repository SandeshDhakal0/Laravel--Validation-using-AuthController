<?php

namespace App\Http\Controllers;
use App\Models\Log;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        $events = array();
        $logs = Log::all();
        foreach($logs as $log){
            $events[] = [
              'title'=>$log->title,
                'start'=>$log->start_date,
                'end'=>$log->end_date,
            ];
        }
        return view('calendar.calendar',['events'=>$events]);
    }
}
