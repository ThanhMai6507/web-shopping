<?php

declare(strict_types=1);

namespace App\Repositories;
use Illuminate\Support\Facades\Storage;
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

    public function saveFile($file, $attachableType, $attachableId, $conditions = ['id' => null])
    {
        return $this->save([
            'file_path' => Storage::putFile('public/attachments', $file),
            'file_name' => $file->hashName(),
            'extension' => $file->extension(),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'attachable_type' => $attachableType,
            'attachable_id' => $attachableId,
        ]);
    }
}
