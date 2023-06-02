<?php
namespace App\Repositories;

use App\Models\Order;


class OrderRepository
{
    public function index()
    {
        $categories = Order::get();

        return $categories;
    }

    public function create($request, $product)
    {
        $userId = currentUser()->id;

        $order = Order::create([
            'product_id'                => $request->product_id,
            'total_qty'                 => $request->total_qty,
            'total_price'               => ($request->total_qty * $product->price),
            'user_id'                   => $userId
        ]);

        return $this->fetch($order->id);
    }

    public function fetch($id)
    {
        $category = Order::with(['product' => function ($product){
            $product->with('category');
        },'user' => function ($user){
            $user->selectRaw('id, name, email');
        }])->find($id);

        return $category;
    }

    public function update($request, $id)
    {
        $category = Order::findOrFail($id);

        $category->update([
            'name'      => $request->name,
        ]);

        return $category;
    }

    public function delete($id)
    {
        $category = Order::findOrFail($id);

        $category->delete($id);

        return $category;
    }
}