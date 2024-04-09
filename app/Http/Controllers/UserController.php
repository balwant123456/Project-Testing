<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function get_all_users(Request $request){

    $users = User::all();

    return response()->json([
        'status' => 'success',
        'users' => $users
    ]);

   }
}
