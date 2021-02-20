<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Laravel\Sanctum\NewAccessToken;

class RegisterLoginController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['email_verified_at'] = now();
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
         
        $response = [
            'success'=> true,
            'data'=> $success,
            'message'=> 'User has been registered sucessfully',
        ];

        return response()->json($response,200);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password'=> 'required',
        ]);
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;

            $response = [
                'success'=>true,
                'data'=>$success,
                'message' => 'User has been sucessfully login',
            ];
            return response()->json($response,200);
        }
        else{
            $response = [
                'success'=>false,
                'message' => 'Username or Password is incorrect',
            ];
            return response()->json($response,404);
        }

    }
}
