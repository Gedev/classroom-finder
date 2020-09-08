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
            $users = User::where('id', $id);
            \Log::info($id);
        }
        return response()->json($users);
    }
}
