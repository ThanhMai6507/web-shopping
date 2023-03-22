<?php

namespace App\Repositories;
use App\Models\User;

class BaseRepository
{
    protected $model;
    public const SORT_TYPES = ['desc', 'asc'];
    public const PER_PAGE = 8;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        $this->model->updateOrCreate($conditions, $inputs);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }
}
