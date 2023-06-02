<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    protected $productRepository;
    protected $orderRepository;

    public function __construct(
        ProductRepository $productRepository,
        OrderRepository $orderRepository
    ) {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id'   => 'required',
            'total_qty'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check Product
        $product = $this->productRepository->fetch($request->product_id);

        //buat Order
        $order = $this->orderRepository->create($request, $product);

        if($order){
            $this->productRepository->updateQty($order);
        }

        return resJson(true, 'Berhasil Membuat Order Proudct', $order, 200);
    }

    public function show($id)
    {
        $order = $this->orderRepository->fetch($id);

        return resJson(true, 'Data Order', $order, 200);
    }

    public function delete($id)
    {
        $this->orderRepository->delete($id);

        return resJson(true, 'Data Order Berhasil Dihapus', null, 200);
    }
}
