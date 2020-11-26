<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers;
use App\CourseUser;
use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function homepage()
    {
        $users = DB::table('users')->get();
        $json = json_decode(file_get_contents(storage_path() . "/webdev1_schedule_2021.json"), true);
        $user = auth()->user()->id;
        $schedule = CourseUser::where('user_id',$user)->with(['course'])->get();
        // return print_r(json_decode($schedule));
        $schedule = json_decode($schedule);
        $classes = [];

        $days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
        foreach($days as $day){
            foreach($schedule as $key => $sc){
                if($sc->day == $day)
                {
                    $classes[$day][$key]['day'] = $sc->day;
                    $classes[$day][$key]['start_at'] = $sc->start_at;
                    $classes[$day][$key]['end_at'] = $sc->end_at;
                    $classes[$day][$key]['course_name'] = $sc->course->name;
                    $classes[$day][$key]['course_id'] = $sc->course->id;
                }
            }
        }
        
        return view('index')->with(
            [
                'users'=>$users,
                'schedule'=>$json,
                'classes'=>$classes
            ]
        );
    }

    public function userAccount()
    {
        $users = DB::table('users')->get();
        $user = auth()->user();
        return view('userAccount', ['users'=>$users]);
    }

    public function adminPanel()
    {
        return view('adminPanel');
    }

    public function adminPanelPermissions()
    {
        return view('admin/permissions');
    }

    public function attendanceRecord()
    {
        $userAuthenticated = Auth::user();
        $users = DB::table('users')->get();
        $classrooms = DB::table('classrooms')->get();
        $sections = DB::table('sections')->get();
        $userSections = DB::table('sections')
            ->where('id', '=', $userAuthenticated->section_id)
            ->get();

        return view('attendanceRecord', [
            'users'=>$users,
            'classrooms'=>$classrooms,
            'sections' => $sections,
            'userSections' => $userSections,
            'userAuthenticated' => $userAuthenticated,
        ]);
    }

    public function mark_attendance($id)
    {
        $userAuthenticated = Auth::user();
        $users = DB::table('users')->get();
        $classrooms = DB::table('classrooms')->get();
        $sections = DB::table('sections')->get();
        $userSections = DB::table('sections')
            ->where('id', '=', $userAuthenticated->section_id)
            ->get();
        $course = Course::where('id',$id)->with(['section'])->first();
        // return $course;

        return view('attendanceRecord', [
            'users'=>$users,
            'classrooms'=>$classrooms,
            'sections' => $sections,
            'userSections' => $userSections,
            'userAuthenticated' => $userAuthenticated,
        ]);
    }
}
