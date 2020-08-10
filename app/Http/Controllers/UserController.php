<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            echo $user->name;
        }
    }

    public function addUser($name, $password)
    {
        DB::table('users')->insert([
            [
                'email' => $email,
                'name' => $name,
                'password' => bcrypt($password)
            ]
        ]);
    }

}
