<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 10/01/21
 * Time: 17:20
 */

namespace App\Repository;

use App\Enums\RolesEnum;
use App\Rol;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserRepository
{
    public function getUsersRolUsuario()
    {
        $users = User::whereHas('rol',function ($query){
            $query->where('name',RolesEnum::user);
        });
        return DataTables::of($users)
            ->addIndexColumn()
            ->make(true);
    }
}