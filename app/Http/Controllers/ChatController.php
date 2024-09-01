<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getUsers (){
        $users = User::get();
        return response()->json($users);
    }
}
