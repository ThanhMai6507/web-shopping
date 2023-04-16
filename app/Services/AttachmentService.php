<?php

namespace App\Services;

use App\Repositories\AttachmentRepository;

class AttachmentService
{
    protected $attachmentRepository;

    public function __construct (AttachmentRepository $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }

    public function getAttachmentRepository(): AttachmentRepository
    {
        return $this->attachmentRepository;
    }
}
