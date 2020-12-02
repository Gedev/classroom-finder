<?php

namespace App\Http\Controllers;
use App\Attendance;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        try{
            $user = User::where('card_id',$request->resultCode)->first();
            if(empty($user)){
                return response(["status"=>"not_found"],200);
            }
            $dt = Carbon::now();
            $attendance = Attendance::where('user_id',$user->id)
                ->where('course_id', $request->course_id)
                ->where('class_time', $request->class_time)
                ->where('section_id', $request->section_id)
                ->whereDate('created_at',$dt->toDateString())
                ->count();
            if($attendance > 0)
            {
                return response(["status"=>"existed"],200);
            }
            Attendance::create([
                'user_id' => $user->id,
                'course_id' => $request->course_id,
                'section_id' => $request->section_id,
                'class_time' => $request->class_time
            ]);
            return response(["status"=>"added"],200);
        }
        catch(\Exception $e){
            // do task when error
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $attendances = Attendance::where('user_id',$id)->with(['course','section','user'])->get();
        return view('users.attendanceReport')->with('attendances',$attendances);
    }

    public function mark_attendance($id)
    {
        return $id;
    }

}
