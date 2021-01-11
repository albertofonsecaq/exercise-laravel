<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 10/01/21
 * Time: 23:34
 */

namespace App\Repository;


use App\Product;
use Yajra\DataTables\Facades\DataTables;
class ProductRepository
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function allProduct()
    {
        $products = Product::all();
        return DataTables::of($products)
            ->addIndexColumn()
            ->make(true);
    }
}