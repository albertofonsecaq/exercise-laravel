<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 10/01/21
 * Time: 22:02
 */

namespace App\Repository;

use App\PurchaseOrder;
use Yajra\DataTables\Facades\DataTables;
class PurchaseOrderRepository
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function listOrders()
    {
        $object = PurchaseOrder::with(['user','address'])
                ->paginate()->toArray();
             /*   ->get()
                ->transform(function ($item){
                    $item['name_user'] = $item->user->full_name;
                    $item['addresss'] = !empty($item->address) ? $item->address->description : '';
                    return $item;
                });*/
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
     * @param $user
     * @return mixed
     */
    public function getOrdersByUser($user)
    {
        $orders = PurchaseOrder::whereHas('user',function ($query) use ($user){
            $query->where('id',$user->id);
            })
            ->with('address')
            ->with('products')
            ->get()
            ->toArray();
        return $orders;
    }

    public function getOrdersWithUser()
    {
        $object = PurchaseOrder::with('user')
            ->with('address')
            ->with('products')
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