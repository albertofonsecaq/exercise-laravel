<?php

namespace App\Http\Controllers;

use App\Repository\AddressRepository;
use App\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function getAddressByUser($user_id)
    {
        $user = User::find($user_id);
        if(empty($user))
            return response()->json(['message'=>'Usuario no encontrado' ],404);
        $address = $this->addressRepository->getAddressByUser($user);
        return response()->json(['data'=>$address],200);
    }
}
