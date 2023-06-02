<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PaymentRepository;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    protected $paymentRepository;

    public function __construct(
        PaymentRepository $paymentRepository
    ) {
        $this->paymentRepository = $paymentRepository;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order_id'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $payment = $this->paymentRepository->create($request);

        if($payment){
            return resJson(true, 'Upload Pembayaran Berhasil', $payment, 200);
        }else{
            return resJson(false, 'Upload Pembayaran Gagal', null, 402);
        }
    }

    public function show($id)
    {
        $payment = $this->paymentRepository->fetch($id);

        return resJson(true, 'Data Order', $payment, 200);
    }
}
