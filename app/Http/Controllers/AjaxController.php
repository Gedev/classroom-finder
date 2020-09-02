<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function index($id) {
        var_dump('hello');
        $users = User::where('id', $id);

        return response($users);
    }
}
