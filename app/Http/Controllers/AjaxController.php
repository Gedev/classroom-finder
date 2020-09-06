<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Request;



class AjaxController extends Controller
{
    public function index($id) {

        if (Request::ajax())
        {
            $users[] = User::where('id', $id);

        }
        return response()->json($users);
    }
}
