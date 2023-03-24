<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Schema;

class ProductRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getByUserId($userId)
    {
        return Product::whereRelation('users', 'users.id', $userId)->with('category')->get();
    }
}
