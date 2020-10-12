<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers;

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
        return view('index', ['users'=>$users]);
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
        $userCourses = DB::table('sections')
            ->where('id', '=', $userAuthenticated->section_id)
            ->get();

        return view('attendanceRecord', [
            'users'=>$users,
            'classrooms'=>$classrooms,
            'sections' => $sections,
            'userCourses' => $userCourses,
            'userAuthenticated' => $userAuthenticated,
        ]);
    }
}
