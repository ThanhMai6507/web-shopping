<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Schema;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getAllProducts()
    {
        $query = $this->model->query();

        $columnSortName = $input['sort_name'] ?? 'id';
        $columnSortType = $input['sort_type'] ?? 'asc';
        $validColumn = Schema::hasColumn($this->model-> getTable(), $columnSortName);
        $validSortType = in_array(strtolower(trim($columnSortType)), static::SORT_TYPES);

        if ($validColumn && $validSortType) {
            $query->orderBy($columnSortName, $columnSortType)->paginate(static::PER_PAGE);
        }

        return $query->paginate(static::PER_PAGE);
    }

    public function getByUserId($userId)
    {
        return Product::whereRelation('users', 'users.id', $userId)->with('category')->get();
    }
}
