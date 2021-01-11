<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('usuarios.lista');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function listUsers(Request $request)
    {
        return $this->userRepository->getUsersRolUsuario();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);
        if(empty($user))
            return response()->json(['message'=>'Usuario no encontrado' ],404);
        return response()->json($user->toArray(),'200');
    }

    public function usersWithAddress(Request $request)
    {
        return $this->userRepository->usersWithAddress();
    }


}
