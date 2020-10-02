<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Request;



class AjaxController extends Controller
{
    public function index($id) {
        if (Request::ajax())
        {
            $users = User::where('section', $id)->get();
            if (!($users->count()))
            {
                \Log::info("EMPTY");
                $users="";
            } else {
                \Log::info("users :" . $users);
                $users=json_encode($users);
            }


        }
        return response($users);
    }
}
