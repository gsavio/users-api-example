<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{

    /**
     *  List all users 
     * 
     * return 
    */
    public function index() {
        $users = new User;

        return $users->all()->json();
    }
}
