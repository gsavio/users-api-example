<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     *  List all users 
     * 
     * @return \Illuminate\Http\JsonResponse
    */
    public function index() {
        $users = new User;
        
        if($users->all()->isEmpty()) {
            return response()->json(['response' => 'No registered users']);
        }
        
        return response()->json($users->all());
    }

    /**
     * Data of a specific user
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        $user = new User;

        $userData = $user->find($id);
        
        if(is_null($userData)) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($userData);
    }

    /**
     * Create a new user
     */
    public function create(Request $request) {

        $input = Validator::make($request->all(), 
        [
            'name' => 'required|max:250',
            'age' => 'required|numeric',
            'email' => 'required|unique:users,email|max:170',
            'phone' => 'required|max:20',
            'city' => 'required|max:150',
            'state' => 'required|max:2'
        ]);

        if(!$input->fails()) {
            $user = new User;
            $user->fill($request->all());
            $user->save();  

            return response()->json(['response' => 'User ' . $request->name . ' created'], 201);
        } 

        return response()->json(['error' => $input->errors()], 400);
    }

    public function edit(Request $request, $id) {
        $input = Validator::make($request->all(), 
        [
            'name' => 'required|max:250',
            'age' => 'numeric',
            'email' => 'max:170',
            'phone' => 'max:20',
            'city' => 'max:150',
            'state' => 'max:2'
        ]);
        
        $user = User::findOrFail($id);

        if(!$input->fails()) {
            $user->fill($request->except('email'));            
            $user->save();

            return response()->json(['response' => 'User ' . $request->name . ' updated']);            
        }
        
        return response()->json(['error' => $input->errors()], 400);
    }

    
    public function delete($id) {
        $user = User::find($id);
        
        if(!is_null($user)) {
            $user->delete();

            return response()->json(['response' => 'User deleted']);
        }

        return response()->json(['error' => 'User not found'], 404);
    }
}
