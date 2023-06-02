<?php
namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function index()
    {
        $payment = Payment::get();

        return $payment;
    }

    public function create($request)
    {
        $image = $request->file('upload_image');
        $image->storeAs('public/payment', $image->hashName());

        $payment = Payment::create([
            'upload_image'          => $image->hashName(),
            'order_id'              => $request->order_id,
        ]);

        return $this->fetch($payment->id);
    }

    public function fetch($id)
    {
        $payment = Payment::with(['order' => function ($order){
            $order->with('product', 'user');
        }])->find($id);

        return $payment;
    }
}