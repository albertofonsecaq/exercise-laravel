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
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getUsersRolUsuario()
    {
        $object = User::whereHas('rol',function ($query){
            $query->where('name',RolesEnum::user);
        })->paginate()->toArray();
        return DataTables::of($object['data'])
            ->with([
                "recordsTotal" => $object['total'],
                "recordsFiltered" => $object['per_page'],
                "current_page" => $object['current_page'],
                "first_page_url" => $object['first_page_url'],
                "from" => $object['from'],
                "last_page" => $object['last_page'],
                "last_page_url" => $object['last_page_url'],
                "next_page_url" => $object['next_page_url'],
                "path" => $object['path'],
                "per_page" => $object['per_page'],
                "prev_page_url"=> $object['prev_page_url'],
                "to" => $object['to'],
                "total" => $object['to']
            ])
            ->make(true);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function usersWithAddress()
    {
        $object = User::whereHas('rol',function ($query){
                    $query->where('name',RolesEnum::user);
                })
                ->with('address')
                ->paginate()->toArray();
        return DataTables::of($object['data'])
            ->with([
                "recordsTotal" => $object['total'],
                "recordsFiltered" => $object['per_page'],
                "current_page" => $object['current_page'],
                "first_page_url" => $object['first_page_url'],
                "from" => $object['from'],
                "last_page" => $object['last_page'],
                "last_page_url" => $object['last_page_url'],
                "next_page_url" => $object['next_page_url'],
                "path" => $object['path'],
                "per_page" => $object['per_page'],
                "prev_page_url"=> $object['prev_page_url'],
                "to" => $object['to'],
                "total" => $object['to']
            ])
            ->make(true);
    }
}