<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController as BaseController;
use function Spatie\Ignition\ErrorPage\jsonEncode;


class AuthController extends BaseController
{
    //
    public function register()
    {

        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        if($request->acceptsJson()) {

            return response();
        }


        return redirect('dashboard');
    }



    public function update(Request $request, $id)
    {
        if($request->acceptsJson()) {

            return response();
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->update();


        return redirect('dashboard/users');
    }

    public function login()
    {

        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {

//        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
//        {
//            $authUser = Auth::user();
//            $success['token'] = $authUser->createToken('Soko')->plainTextToken;
//            $success['token'] = $authUser->name;
//
//            return response(route('dashboard'), 200)
//                ->header($success, 'User Signed in');
//        } else{
//            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
//        }

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $authUser = Auth::user();
            $success['token'] = $authUser->createToken('Soko')->plainTextToken;
            $success['token'] = $authUser->name;
            $route = view('home.admin');

//            if($request->acceptsJson()) {
////                return redirect('dashboard')->with('User Logged in', json_encode(['success'=>'logged in']));
//                return response()->json([
//                    'data'=>$success,
//                    201
//                ]);
//            } elseif (!$request->acceptsJson())
//            {
                return redirect('dashboard');
//            }



        } else
        {
            return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
        }



    }

    public function logout() {
        Auth::logout();

        return redirect('login');
    }

    public function home()
    {

        return view('home');
    }
}

