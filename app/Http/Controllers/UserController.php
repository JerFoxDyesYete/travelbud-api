<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
//show all users
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
//create new user
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create($request->all());

        return response()->json([
            'Message' =>  "{$user->name}, Successfully Created!",
            $user
        ]);
    }
    
//get user by index
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['Message' => "User with id {$id} not found."], 404);
        }
        return response()->json($user);
    }
//update users info index
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['Message' => "User with id {$id} not found."], 404);
        }
        
        $user->update($request->all());
        return response()->json($user, 200);
    }
//delete user by index
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['Message' => "User with id {$id} not found."], 404);
        }

        $user->delete();
        return response()->json(['Message' => "User with id {$id} successfully deleted!"], 200);
    }
}
