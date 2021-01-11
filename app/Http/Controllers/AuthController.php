<?php

namespace App\Http\Controllers;

use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'rol' => [
                    'required',
                    Rule::in(['Administrador', 'Usuario'])
                ],
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'rut' => 'nullable'
        ]);
        $input = $request->all();
        Arr::set($input,'password',bcrypt($input['password']));
        $user = User::create($input);
        $user->rol()->associate(Rol::where('name',$input['rol'])->first());
        $user->save();

        return response()->json($user);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password]) ) {

            $user = Auth::user();

            $userRole = $user->rol()->first();

            if ($userRole) {
                $this->scope = $userRole->name;
            }
            $token = $user->createToken($user->email.'-'.now(), [$this->scope]);

            return response()->json([
                'token' => $token->accessToken
            ]);
        }
    }

}
