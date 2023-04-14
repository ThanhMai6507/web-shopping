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

    public function getAll(array $input = [])
    {
        $query = $this->model->query();
        $query->with(['colors', 'sizes']);
        if (!empty($input['search'])) {
            $query->where(
                fn ($query) =>
                    $query->where('name', 'like', '%'.$input['search'].'%')
                          ->orWhere('description', 'like', '%'.$input['search'].'%')
            );
        }

        if (!empty($input['category_id'])) {
            $query->where('category_id', $input['category_id']);
        }

        $columnSortName = $input['sort_name'] ?? 'id';
        $columnSortType = $input['sort_type'] ?? 'asc';
        $validColumn = Schema::hasColumn($this->model-> getTable(), $columnSortName);
        $validSortType = in_array(strtolower(trim($columnSortType)), static::SORT_TYPES);

        if ($validColumn && $validSortType) {
            $query->orderBy($columnSortName, $columnSortType)->paginate(static::PER_PAGE);
        }
        return $query->paginate(static::PER_PAGE);
    }
}
