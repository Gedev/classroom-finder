<?php

namespace App\Http\Controllers;
use App\Attendance;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function makeAttendance(Request $request)
    {
        try{
            $user = User::where('card_id',$request->resultCode)->first();
            Attendance::create(['user_id'=> $user->id]);
            return true;
        }
        catch(\Exception $e){
            // do task when error
            echo $e->getMessage();
        }
    }
}
