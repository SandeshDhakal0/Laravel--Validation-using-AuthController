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
                'id' =>$log->id,
              'title'=>$log->title,
                'start'=>$log->start_date,
                'end'=>$log->end_date,
            ];
        }
        return view('calendar.calendar',['events'=>$events]);
    }

    public function store(Request $request)
    {
//        if ($request->ajax()) {
            $request->validate([
                'title' => 'required|string'
            ]);
            $log = log::create([
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            return response()->json($log);
        }
        public function update(Request $request,$id)
        {
            $log = log::find($id);
            if(! $log) {
                return response()->json([
                    'error'=>'Unable to locate the event'
                ],404);
            }
            $log->update([
               'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
            ]);
        }
}
