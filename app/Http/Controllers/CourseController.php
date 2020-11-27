<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Course;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Schedule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('courses.index',
            ['courses' => Course::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $request -> validate([
            'id' => 'required',
            'name' => 'required',
            'classroom_id' => 'required',
        ]);

        $course = new Course([
           'id' => $request->get('id'),
            'name' => $request->get('name'),
            'classroom_id' => $request->get('classroom_id'),
        ]);

        $course->save();

        return redirect('courses')->with('success', 'The course has been successfully created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'classroom_id' => 'required',
        ]);

        $course = Course::find($id);

        $course->id = $request->get('id');
        $course->name = $request->get('name');
        $course->classroom_id = $request->get('classroom_id');

        $course->save();

        return redirect('/courses')->with('success', 'The course has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('/courses')->with('success', 'The course {{ $course }} has been deleted successfully');
    }


    public function getCoursesAgainstSection(Request $request)
    {
        try{
            $courses = Course::where('section_id',$request->section_id)->get();
            return $courses;
        }
        catch(\Exception $e){
            // do task when error
             echo $e->getMessage();
          }
    }
}
