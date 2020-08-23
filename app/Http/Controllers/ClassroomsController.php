<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('classrooms.index',
            ['classrooms' => Classroom::all()],
            ['users' => User::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $request_hasWhiteboard = $request->get('has_whiteboard');
        $request_hasProjector = $request->get('has_projector');
        $classroom = new Classroom([
            'id' => $request->get('id'),
            'floor' => $request->get('floor'),
            'nb_of_seats' => $request->get('nb_of_seats'),
            'has_whiteboard' => $request->get('has_whiteboard'),
            'has_projector' => $request->get('has_projector'),
        ]);

        if(!$request_hasWhiteboard) {
            $classroom['has_whiteboard'] = 0;
        }

        if(!$request_hasProjector) {
            $classroom['has_projector'] = 0;
        }


        $classroom->save();

        return redirect('classrooms')->with('success', 'Classroom created !');
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
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
