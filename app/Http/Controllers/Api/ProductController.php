<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->paginate();

        return resJson(true, 'List Data Products', $products, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'category_id'   => 'required',
            'price'         => 'required',
            'qty'           => 'required',
            'description'   => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = $this->productRepository->create($request);

        if($product){
            return resJson(true, 'Menambah Data product Berhasil', $product, 200);
        }else{
            return resJson(false, 'Menambah Data product Gagal', null, 402);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'          => 'required',
            'category_id'   => 'required',
            'price'         => 'required',
            'qty'           => 'required',
            'description'   => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = $this->productRepository->update($request, $id);

        if($product){
            return resJson(true, 'Update Data product Berhasil', $product, 200);
        }else{
            return resJson(false, 'Update Data product Gagal', null, 402);
        }
    }

    public function show($id)
    {
        $product = $this->productRepository->fetch($id);

        if($product){
            return resJson(true, 'Data Product', $product, 200);
        }else{
            return resJson(false, 'Data Tidak Ditemukan', null, 404);
        }
    }

    public function delete($id)
    {
        $this->productRepository->delete($id);
        
        return resJson(true, 'Data Product Berhasil Dihapus', null, 200);
    }
}
