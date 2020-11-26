<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Validator;
use App\CourseUser;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $users = User::orderBy('email')->paginate(5);

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $email
     * @param $name
     * @param $password
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'idCard' => $request->get('idCard'),
            'password' => Hash::make($request->get('password'))
        ]);

        $user->save();

        return redirect('users')->with('success', 'The user has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $users = User::find($id);
        $classrooms = DB::table('classrooms')->get();
        $section = DB::table('sections')->get();

        return view('users.edit', [
            'user'=>$users,
            'classrooms'=>$classrooms,
            'sections' => $section
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->idCard = $request->get('idCard');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect('/users')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', 'The user {{ $user }} has been deleted Successfully');
    }

    public function sortByName()
    {
        $users = User::all();
        $users->sortBy('name');
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function sortByEmail()
    {
        $users = User::all()->sortBy('email');

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function user_course_create()
    {
        $courses = Course::all();
        return view('users.courses.create',compact('courses'));
    }

    public function user_course_store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'course' => 'required',
            'day' => 'required',
            'time' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return response($validator->messages(), 422);
        }
        $course_id = $request->course;
        $day = $request->day;
        $time = explode("-", $request->time);
        $start_at = $time[0];
        $end_at = $time[1];
        $user_id = $request->user_id;

        $is_already_registered = CourseUser::where('day',$day)
        ->where('start_at','<=',$start_at)
        ->where('end_at','>=',$end_at)
        ->exists();

        if($is_already_registered)
        {
            return response(["message"=> "You have already registered course in this day and time."], 409);
        }

        CourseUser::create([
            'course_id' => $course_id,
            'day' => $day,
            'start_at' => $start_at,
            'end_at' => $end_at,
            'user_id' => $user_id
        ]);

        return response(["message"=> "Course is registered successfully"], 201);

    }
}


