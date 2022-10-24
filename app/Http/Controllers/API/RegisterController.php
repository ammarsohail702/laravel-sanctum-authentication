<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Mail;
class RegisterController extends BaseController
{
     /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $already_check = User::where('email',$request->email)->get();
        if(count($already_check)>0){
            return $this->sendError('Email already exist.');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            Mail::send('verifyEmail', ['randomcode'=>'12345'], function($message) use($request){
                $message->to($request->email);
                $message->subject('Email Verification Mail');
            });
            $data = array("userid"=>$user->id);
            return $this->sendResponse($data, 'User register successfully. Verification Email Also send');
        }

    }

    /**
    * Login api
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            if($user->email_verified_at != null){
                $success['token'] =  $user->createToken('MyApp')-> plainTextToken; 
                $success['userid'] =  $user->id;
                $success['name'] =  $user->name;
                $success['email_verified_at'] =$user->email_verified_at;
                return $this->sendResponse($success, 'User login successfully.');
            }else{
                return $this->sendError('Please verify your email address.');
            }
        } 
        else{ 
            return $this->sendError('Invalid Email or Password');
        } 
    }



    public function loggedinuser()
    {
        $user = Auth::user(); 
        if($user != ''){ 
            
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['userid'] =  $user->id;
            $success['name'] =  $user->name;
            $success['active_status'] =1;
            $success['email_verified_at'] =$user->email_verified_at;
            return $this->sendResponse($success, 'User logged data.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }



}
