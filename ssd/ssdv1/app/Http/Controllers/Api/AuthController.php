<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create user
     * @param Request $request
     * @return User
     */

     public function createUser(Request $request)
     {

        //try catch block

        try{
            //validated input
         $validateUser = Validator::make($request->all(),
          [
              'name'    => 'required',
              'email'   => 'required|email|unique:users,email',
              'password'=> 'required'
          ]);

          /**
           *  Get error if validation fails
           */
          if($validateUser->fails())
          {
              return response()->json([
                  'status'  =>false,
                  'message' =>'Validation error',
                  'errors'  =>$validateUser->errors()
              ], 401);
          }

        //create user

        $user = User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  Hash::make($request->password)
        ]);

        return response()->json([
            'status'  =>true,
            'message' =>'Successfully created user',
            'token'  =>$user->createToken("API TOKEN")->plainTextToken
        ], 200);
  

        //return responseuser with API token


        //catch block

        }   catch(\Throwable $th)
            {
             return response()->json([
                'status'  =>false,
                'message' =>$th->getMessage()
            ], 500);

            }

     }



     /**
     * Login user
     * @param Request $request
     * @return User
     */

     public function loginUser(Request $request)
     {
         //try catch block

        try{
            //validated input
         $validateUser = Validator::make($request->all(),
          [
              'email'   => 'required|email',
              'password'=> 'required'
          ]);

          /**
           *  Get error if validation fails
           */
          if($validateUser->fails())
          {
              return response()->json([
                  'status'  =>false,
                  'message' =>'Validation error',
                  'errors'  =>$validateUser->errors()
              ], 401);
          }

        //check login credentials

        if(!Auth::attempt($request->only(['email','password'])))
        {
            return response()->json([
                'status'  =>false,
                'message' =>'Email and Password does not match with our record.'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status'  =>true,
            'message' =>'Successfully logged in.',
            'token'  =>$user->createToken("API TOKEN")->plainTextToken
        ], 200);
  

        //return responseuser with API token

        
        //catch block

        }   catch(\Throwable $th)
            {
             return response()->json([
                'status'  =>false,
                'message' =>$th->getMessage()
            ], 500);

            }

     }

     
}
