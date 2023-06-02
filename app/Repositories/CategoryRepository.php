<?php
namespace App\Repositories;

use App\Models\ProductCategory;


class CategoryRepository
{
    public function index()
    {
        $categories = ProductCategory::get();

        return $categories;
    }

    public function create($request)
    {
        $category = ProductCategory::create([
            'name'      => $request->name,
        ]);

        return $category;
    }

    public function fetch($id)
    {
        $category = ProductCategory::with('products')->find($id);
        return $category;
    }

    public function update($request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $category->update([
            'name'      => $request->name,
        ]);

        return $category;
    }

    public function delete($id)
    {
        $category = ProductCategory::findOrFail($id);

        $category->delete($id);

        return $category;
    }
}