<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->index();

        return resJson(true, 'List Data Categories', $categories, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $category = $this->categoryRepository->create($request);

        if($category){
            return resJson(true, 'Menambah Data Category Berhasil', $category, 200);
        }else{
            return resJson(false, 'Menambah Data Category Gagal', null, 402);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $category = $this->categoryRepository->update($request, $id);

        if($category){
            return resJson(true, 'Update Data Category Berhasil', $category, 200);
        }else{
            return resJson(false, 'Update Data Category Gagal', null, 402);
        }
    }

    public function show($id)
    {
        $category = $this->categoryRepository->fetch($id);

        if($category){
            return resJson(true, 'Data Category', $category, 200);
        }else{
            return resJson(false, 'Data Tidak Ditemukan', null, 404);
        }
    }

    public function delete($id)
    {
        $this->categoryRepository->delete($id);
        
        return resJson(true, 'Data Category Berhasil Dihapus', null, 200);
    }
}
