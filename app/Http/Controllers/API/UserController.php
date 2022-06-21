<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use function Symfony\Component\Mime\Header\all;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return response()->json([UserResource::collection($users), 'Users Fetched']);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);



        return response()->json(['User added Successfull.', new UserResource($users)]);
    }
}
