<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AttachmentRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $attachmentRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, AttachmentRepository $attachmentRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->attachmentRepository = $attachmentRepository;
    }

    public function index(Request $request)
    {
        return view('backend.products.index', [
            'products' => $this->productRepository->getAll($request->all()),
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ProductRequest $request)
    {
        //
    }

    public function edit(int $id)
    {
        //
    }

    public function update(ProductRequest $request, $id)
    {
        //
    }

    public function show(int $id)
    {
       //
    }
}
