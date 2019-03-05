<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(Request $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if($user === null) {
            return response()->json(['error' => true, 'message' =>  "user not found!"], 401);
        }

        //get user's token
        $token = $user->api_token;

        if (Hash::check($password, $user->password)) {

            return response()->json(['data' => [ 'success' => true, 'user' => $user, 'token' => 'Bearer ' . $token]], 200);

        }
        return response()->json(['error' => true, 'message' => "Invalid Credential"], 401);
        
    }
}
