<?php

namespace App\Http\Controllers;

use App\Repository\PurchaseOrderRepository;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepository)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }

    public function index()
    {
        return view('orders.lista');
    }

    public function listOrders(Request $request)
    {
        return $this->purchaseOrderRepository->listOrders();
    }
}
