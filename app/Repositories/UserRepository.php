<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Schema;

class UserRepository extends BaseRepository
{
    public function getAll(array $input = [])
    {
        $query = $this->model->query();

        if (!empty($input['search'])) {
            $query->where(
                fn ($query) =>
                    $query->where('name', 'like', '%'.$input['search'].'%')
                          ->orWhere('email', 'like', '%'.$input['search'].'%')
            );
        }

        if (!empty($input['role'])) {
            $query->where('type', $input['role']);
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
