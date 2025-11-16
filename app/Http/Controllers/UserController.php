<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all_users()
    {
        $users = DB::select("SELECT * FROM view_appuser");
        return response()->json([
            'message' => 'Users retrieved successfully',
            'data' => $users
        ]);
    }

     

}
