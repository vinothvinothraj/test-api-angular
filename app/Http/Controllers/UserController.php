<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users with their user information details
        $users = UserInformation::all();
        return response()->json($users);
    }
}
