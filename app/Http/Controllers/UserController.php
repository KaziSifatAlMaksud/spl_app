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

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (!$username || !$password) {
            return response()->json([
                'message' => 'Username and password are required'
            ], 400);
        }

        // Fetch user from DB
        $user = DB::table('view_appuser')
                    ->where('user_name', $username)
                    ->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        // Hash incoming password (MD5)
        $hashedPassword = md5($password);

        // Compare
        if ($hashedPassword !== $user->user_password) {
            return response()->json([
                'message' => 'Invalid username or password'
            ], 401);
        }

        // SUCCESS RESPONSE
        return response()->json([
            'message' => 'Login successful',
            'data' => [
                'user_id' => $user->user_id,
                'username' => $user->user_name,
                'first_name' => $user->first_name,
                'department_name' => $user->department_name,
                'role' => $user->user_level,
            ]
        ]);
    }


     

}
