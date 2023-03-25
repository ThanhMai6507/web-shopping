<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getByUserId($userId)
    {
        return $this->model->whereRelation('users', 'users.id', $userId)->with('category')->get();
    }
}
