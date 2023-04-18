<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct (UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }
    
    public function findById(int $id)
    {
        return $this->userRepository->find($id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        return $this->userRepository->save($conditions, $inputs);
    }
}
