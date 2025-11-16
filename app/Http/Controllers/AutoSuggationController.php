<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AutoSuggationController extends Controller
{
     public function getEmployees()
    {
        $users = DB::select("SELECT user_id as id,first_name as name FROM view_appuser where isActive='Active'");
        return response()->json([
            'message' => 'Employees retrieved successfully',
            'data' => $users
        ]);
    }
     public function getDepmartment()
    {
        $users = DB::select("SELECT department_id as id,department_name as name FROM hrm_departments where display=0");
        return response()->json([
            'message' => 'Employees retrieved successfully',
            'data' => $users
        ]);
    }

}
