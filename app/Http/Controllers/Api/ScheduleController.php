<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Lecture;
use App\Models\GroupLecture;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the schedule.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::with('lectures')->find($id);
        return $group;
    }    

    public function store(Request $request)
    {
        if (Group::find($request->group_id) 
            && Lecture::find($request->lecture_id)) {
            //TODO update to full time
            $day = $request->day;
            $hour = $request->hour;
            $pivot = GroupLecture::where('group_id',$request->group_id)
                ->where('lecture_id',$request->lecture_id)->get();
            if ($pivot->count() > 1) {
                return ['message' => 'Error: lecture duplicated'];
            } elseif ($pivot->count() == 1) {
                $item = $pivot->first();
                $item->update([]);
            } elseif ($pivot->count() == 0) {
                $item->create([]);
            }


            return ['message' => 'The goal has been achieved'];
        } 
        return ['message' => 'Incorrect data'];

    }   
}
