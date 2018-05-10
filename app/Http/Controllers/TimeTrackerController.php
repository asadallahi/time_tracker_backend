<?php

namespace App\Http\Controllers;


use App\TimeTracker;
use Illuminate\Http\Request;

class TimeTrackerController extends Controller {

    public function index()
    {
        return 'welcome to time tracker backend3';
    }

    public function postData(Request $request)
    {
        $time = $request->json()->get('time');
        $description = $request->json()->get('description');
        $task_time = $request->json()->get('task_time');

        $time_tracker = new TimeTracker();
        $time_tracker->duration = $time;
        $time_tracker->description = $description;
        $time_tracker->task_time = $task_time;

        if ($time_tracker->save())
        {
            return response()->json(['id' => $time_tracker->duration]);
        }

        return response()->json(['error' => 1]);

    }

    public function getList(Request $request)
    {
        $query_string= $request->get('q');
        if ($query_string){
            $list = TimeTracker::where('description', 'like' , '%'.$query_string.'%')->get();
            return response()->json($list);
        }
        //todo: filter
        $time_tracker = TimeTracker::all();
        return response()->json($time_tracker);
    }
}