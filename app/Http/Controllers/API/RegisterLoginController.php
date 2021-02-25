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
    

      /**
     * @OA\Post(
     ** path="/api/register",
     *   tags={"Authentication"},
     *   summary="Registering new user",
     *   operationId="register",
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="confirm_password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *
     *
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\JsonContent(),
     *      
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return response()->json([
                'ErrorMessage' => 'Validation error'.$validator->errors()
            ]);   
        }
            else{
                $input = $request->except('confirm_password');
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
           
    }

      /**
     * @OA\Post(
     ** path="/api/login",
     *   tags={"Authentication"},
     *   summary="Login to the system",
     *   operationId="login",
     *
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *        @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      
     *      
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password'=> 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'ErrorMessage' => 'Validation error'.$validator->errors()
            ]);
        }
        else{
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

    /**
     * @OA\Post(
     *      path="/api/logout",
     *      operationId="logout",
     *      tags={"Authentication"},
     *      summary="logout a user",
     *      description="logout a user",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       )
     *      
     *      
     *      
     * )
     */

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
    return response()->json([
        'message' => 'You have been successfully logged out.'
        ]);
}
    
}
