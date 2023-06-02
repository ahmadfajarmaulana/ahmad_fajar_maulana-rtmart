<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductRepository
{
    public function paginate()
    {
        $products = Product::with('category')->latest()->paginate(5);

        return $products;
    }

    public function create($request)
    {
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::create([
            'name'                      => $request->name,
            'category_id'               => $request->category_id,
            'description'               => $request->description,
            'price'                     => $request->price,
            'qty'                       => $request->qty,
            'image'                     => $image->hashName()
        ]);

        return $product;
    }

    public function fetch($id)
    {
        $product = Product::with('category')->find($id);

        return $product;
    }

    public function update($request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            //upload gambar ke folder public
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            //delete gambar lama
            Storage::delete('public/products/'.$request->image);

            //update prudct dengan gambar baru
            $product->update([
                'name'                      => $request->name,
                'category_id'               => $request->category_id,
                'description'               => $request->description,
                'price'                     => $request->price,
                'qty'                       => $request->qty,
                'image'                     => $image->hashName(),
            ]);
            
        }else{

            $product->update([
                'name'                      => $request->name,
                'category_id'               => $request->category_id,
                'description'               => $request->description,
                'price'                     => $request->prices,
                'qty'                       => $request->qty
            ]);
        }

        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return $product;
    }

    public function updateQty($order)
    {
        $product = Product::find($order->product_id);
        $product->update([
            'qty'        => ($product->qty - $order->total_qty)
        ]);

        return $product;
    }
}