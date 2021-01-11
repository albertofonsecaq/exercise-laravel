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
    public function listOrders()
    {
        $orders = PurchaseOrder::with(['user','address'])
                ->get()
                ->transform(function ($item){
                    $item['name_user'] = $item->user->full_name;
                    $item['addresss'] = !empty($item->address) ? $item->address->description : '';
                    return $item;
                });
        return DataTables::of($orders)
            ->addIndexColumn()
            ->make(true);
    }
}