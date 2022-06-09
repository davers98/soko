<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Mime\Header\all;
use Validator;
use App\Models\User;

class AuthController extends BaseController
{
    //
    public function login(Request $request)
    {
        if(Auth::attempt(
            [
                'email'=>$request->email,
                'password'=>$request->password
            ]
        )){
            $authUser = Auth::user();
            $success['token'] = $authUser->createToken('Soko')->plainTextToken;
            $success['name'] = $authUser->name;
            return $this->sendResponse($success, 'User signed in');
        } else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }


    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
    ]);
        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('Soko')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User created successfully.');
    }

}
