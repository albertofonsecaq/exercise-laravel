<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 10/01/21
 * Time: 23:08
 */

namespace App\Repository;


use App\Address;

class AddressRepository
{
    /**
     * @param $user
     * @return mixed
     */
    public function getAddressByUser($user)
    {
        $address = Address::whereHas('user',function ($query) use ($user){
            $query->where('id',$user->id);
        })
        ->get()
        ->toArray();
        return $address;
    }
}