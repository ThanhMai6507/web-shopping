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
        $query = $this->model->with(['user', 'product.attachment'])->where('user_id', auth()->id());

        return $query->get();
    }
}
