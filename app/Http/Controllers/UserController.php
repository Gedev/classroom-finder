<?php

namespace App\Http\Controllers;

use App\User;
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
}


