<?php

namespace App\Services;

use App\Models\ProductType;

class ProductTypeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private ProductType $model)
    {
        $this->model = $model;
    }

    public function getAllType($parentId = null){
        return $this->model::all();
    }
    public function getProductType($parentId = null){
        return $this->model::where('parent_id', $parentId)->get()
        ->map(function ($productType) {
            $productType->children = $this->getProductType($productType->id);
            return $productType;
        });
    }

    public function createProductType(array $data){
        return $this->model::create($data);
    }
}
