<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgramResource;
use function Doctrine\Common\Cache\Psr6\get;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $users = User::latest()->get();
        response()->json([ProgramResource::collection($users), 'Users Fetched']);
        return view('home.users', compact('users'));
    }

    public function addUser(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return redirect('dashboard/products');
    }
}
