<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use App\HttP\Requests\RegisterRequest;
use App\HttP\Requests\PasswordResetRequest;

class RegisterController extends Controller
{
    
    public function index()
    {
        return Users::all();
    }

    
    public function create(RegisterRequest $Request){
        // Validate the request data

        $validatedData = $Request->validated();

        // Hash the password
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create the user
        $user = Users::create($validatedData);
    
        // Return the created user or a success message
        return response()->json([
            'message' => 'User created successfully',
            'userId' => $user->id
        ], 201);
    }

    public function passwordReset(PasswordResetRequest $Request){

        $validatedData = $Request->validated();
        
        // Check if the passwords match
        if($validatedData['password'] !== $validatedData['password_confirmation']){
            return response()->json(["error" => "Passwords do not match"], 422);
        }

        // Find the user by email
        $user = Users::where('email', $validatedData['email'])->first();

        // Check if user exists
        if(!$user){
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update the user's password
        $user->password = bcrypt($validatedData['password']);
        // $user->name = 'John';
        $user->save();
        
        
        return response()->json(['success' => 'Password updated successfully']);
    }

    public function login(Request $Request){

        
        

    }

    public function show(string $id)
    {
        //

        return 'this is id of user'.$id;
    }

}
