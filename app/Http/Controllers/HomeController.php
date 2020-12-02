<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers;
use App\CourseUser;
use App\Course;
use App\User;

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
        $user_id = auth()->user()->id;
        $user = User::where('id',$user_id)->with(['courses','courses.schedules'])->get()->toArray();
        $courses = $user[0]['courses'];
        $days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
        $days_counter = [
            'monday' => 0,
            'tuesday'=> 0,
            'wednesday'=> 0,
            'thursday' => 0,
            'friday'=> 0,
            'saturday'=>0,
            'sunday'=>0
        ];
        $classes = [];
        foreach($courses as $course)
        {
            if(!empty($course['schedules']))
            {
                foreach($days as $day){
                    foreach($course['schedules'] as $key=> $schedule)
                    {
                        if($schedule['day'] == $day)
                        {
                            $classes[$day][$days_counter[$day]]['day'] = $schedule['day'];
                            $classes[$day][$days_counter[$day]]['start_at'] = $schedule['start_at'];
                            $classes[$day][$days_counter[$day]]['end_at'] = $schedule['end_at'];
                            $classes[$day][$days_counter[$day]]['course_name'] = $course['name'];
                            $classes[$day][$days_counter[$day]]['course_id'] = $course['id'];
                            $days_counter[$day]++;
                        }
                    }
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
