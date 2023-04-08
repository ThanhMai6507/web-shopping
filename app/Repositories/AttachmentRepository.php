<?php

declare(strict_types=1);

namespace App\Repositories;
use App\Models\Attachment;

class AttachmentRepository extends BaseRepository
{
    public function __construct(Attachment $model)
    {
        $this->model = $model;
    }

    public function getByUserId($userId)
    {
        return $this->model->whereRelation('users', 'users.id', $userId)->with('attachment')->get();
    }
}
