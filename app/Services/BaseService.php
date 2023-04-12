<?php

namespace App\Services;

use App\Repositories\AttachmentRepository;
use App\Repositories\BaseRepository;
use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class BaseService
{
    protected $attachmentRepository;
    protected $categoryRepository;
    protected $productRepository;
    protected $userRepository;
    protected $baseRepository;
    protected $cartRepository;

    public function __construct (
        AttachmentRepository $attachmentRepository,
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        UserRepository $userRepository, 
        BaseRepository $baseRepository,
        CartRepository $cartRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->baseRepository = $baseRepository;
        $this->cartRepository = $cartRepository;
    }

    public function getAttachmentRepository(): AttachmentRepository
    {
        return $this->attachmentRepository;
    }

    public function getCategoryRepository(): CategoryRepository
    {
        return $this->categoryRepository;
    }

    public function getProductRepository(): ProductRepository
    {
        return $this->productRepository;
    }

    public function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }

    public function getCartRepository(): CartRepository
    {
        return $this->cartRepository;
    }
}
