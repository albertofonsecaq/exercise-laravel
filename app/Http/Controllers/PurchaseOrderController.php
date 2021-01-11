<?php

namespace App\Http\Controllers;

use App\Repository\PurchaseOrderRepository;
use App\User;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepository)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('orders.lista');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function listOrders(Request $request)
    {
        return $this->purchaseOrderRepository->listOrders();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function getOrdersByUser($user_id)
    {
        $user = User::find($user_id);
        if(empty($user))
            return response()->json(['message'=>'Usuario no encontrado' ],404);
        $orders = $this->purchaseOrderRepository->getOrdersByUser($user);
        return response()->json(['data'=>$orders],200);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getOrdersWithUser(Request $request)
    {
        return $this->purchaseOrderRepository->getOrdersWithUser();
    }

}
