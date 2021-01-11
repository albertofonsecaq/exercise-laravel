<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('usuarios.lista');
    }

    public function listUsers(Request $request)
    {
        return $this->userRepository->getUsersRolUsuario();
    }


}
