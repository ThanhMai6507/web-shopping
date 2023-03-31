<?php

declare(strict_types=1);

namespace App\Repositories;

class AttachmentRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Attachment::class;
    }

    public function getByUserId($userId)
    {
        return $this->model->whereRelation('users', 'users.id', $userId)->with('attachment')->get();
    }
}
