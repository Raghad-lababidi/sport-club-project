<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        try {
            $user=User::create($request->validated());
            $token= $user->createToken($request->name);

            return $this->sendResponse('register successfully', [$user,$token]);
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }


    }

    public function login(LoginRequest $request){
        try {
            $fields=$request->validated();
            $user=User::where('email',$fields['email'])->first();
            if (!$user ||!Hash::check($fields['password'],$user->password)){
                return $this->sendError('login information is incorrect,try again', 401);
            }
            $token= $user->createToken($user->name);

            return $this->sendResponse('login successfully', [$user,$token]);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }

    }
    public function logout(Request $request){
        try {
            $request->user()->tokens()->delete();
            return $this->sendResponse('logged out successfully');
        } catch (Exception $e) {
            return $this->sendError('something went wrong,try again', 500);
        }

    }


}
