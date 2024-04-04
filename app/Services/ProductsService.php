<?php

namespace App\Services;

use App\Models\Product;

class ProductsService
{

    public function getProducts()
    {

        return Product::paginate(10);
    }

    public function getProduct($id)
    {
        return Product::find($id);
    }

    public function createProduct($data)
    {
        return Product::create($data);
    }

    public function updateProduct($data, $id)
    {
        return Product::find($id)->update($data);

    }

    public function deleteProduct($id)
    {
        return Product::find($id)->delete();

    }
}
