<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;

class CartRepository extends BaseRepository
{
    public function __construct(Cart $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getByUserId($userId)
    {
        $query = $this->model
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('attachments', function($join) {
                $join->on('attachments.attachable_id', '=', 'products.id')
                     ->where('attachments.attachable_type', '=', Product::class);
            })
            ->where('user_id', $userId)
            ->select('products.*', 'carts.*', 'attachments.file_name as image');
        return $query->get();
    }
}
