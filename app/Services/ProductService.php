<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct (ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductRepository(): ProductRepository
    {
        return $this->productRepository;
    }

    public function findById(int $id)
    {
        return $this->productRepository->find($id);
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }
    
    public function save(array $inputs, array $conditions = ['id' => null])
    {
        return $this->productRepository->save($conditions, $inputs);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
