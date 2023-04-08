<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AttachmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        return view('backend.products.create', [
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        DB::transaction(function () {
            $input = request()->all();
            $product = $this->productRepository->save($input);
            
            if (!empty($input['image'])) {
                $this->attachmentRepository->save([
                    'attachable_type' => Product::class,
                    'file_path' => Storage::putFile('public/attachments', $input['image']),
                    'file_name' => $input['image']->hashName(),
                    'attachable_id' => $product['id'],
                    'extension' => $input['image']->extension(),
                    'mime_type' => $input['image']->getClientMimeType(),
                    'size' => $input['image']->getSize()
                ]);
            }
        });

        return redirect()->route('products.index')->with('message', 'Create successfully!');
    }

    public function edit(int $id)
    {
        return view('backend.products.edit', [
            'product' => $this->productRepository->findById($id),
            'categories' => $this->categoryRepository->getAll()
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        DB::transaction(function () use ($id) {
            $input = request()->all();
            $this->productRepository->save($input, ["id" => $id]);

            if (!empty($input['image'])) {
                $this->attachmentRepository->save([
                    'attachable_type' => Product::class,
                    'file_path' => Storage::putFile('public/attachments', $input['image']),
                    'file_name' => $input['image']->hashName(),
                    'extension' => $input['image']->extension(),
                    'mime_type' => $input['image']->getClientMimeType(),
                    'size' => $input['image']->getSize(),
                ], ['attachable_id' => $id]);
            }
        });

        return redirect()->route('products.index')->with('message', 'Update successfully');
    }

    public function show(int $id)
    {
        return view('backend.products.show', [
            'product' => $this->productRepository->findById($id)
        ]);
    }

    public function destroy(int $id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('products.index')->with('message', 'Delete successfully!');
    }
}
