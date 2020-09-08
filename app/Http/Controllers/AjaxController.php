<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;



class AjaxController extends Controller
{
    public function index($id) {
        if (Request::ajax())
        {
            $users['data'] = User::where('id', $id)->get();
            $users=json_encode($users);
            \Log::info($users);
        }
        return response($users);
    }
}
