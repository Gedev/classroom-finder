<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomsController extends Controller
{
    /**
     * Show a list of all of the application's classrooms.
     *
     */
    public function index()
    {
        $classrooms = DB::table('classrooms')->get();
        $users = DB::table('users')->get();
        return view('adminPanel', ['users'=>$users], ['classrooms' => $classrooms]);
    }
}
