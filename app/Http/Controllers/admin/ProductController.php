<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\AttachmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $attachmentService;

    public function __construct(ProductService $productService, CategoryService $categoryService, AttachmentService $attachmentService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->attachmentService = $attachmentService;
    }

    public function index(Request $request)
    {
        return view('backend.products.index', [
            'products' => $this->productService->getProductRepository()->getAll($request->all()),
            'categories' => $this->categoryService->getCategoryRepository()->getAll(),
        ]);
    }

    public function create()
    {
        return view('backend.products.create', [
            'categories' => $this->categoryService->getCategoryRepository()->getAll(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $input = [
                "name" => $request->name,
                "price" => $request->price,
                "description" => $request->content,
                "category_id" => $request->category_id,
                "image" => $request->image,
            ];

            $product = $this->productService->getProductRepository()->save($input);

            $this->attachmentService->getAttachmentRepository()->saveFile(
                $input['image'],
                Product::class,
                $product['id']
            );
            DB::commit();

            return redirect()->route('products.index')->with('message', 'Create successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function edit(int $id)
    {
        return view('backend.products.edit', [
            'product' => $this->productService->getProductRepository()->findById($id),
            'categories' => $this->categoryService->getCategoryRepository()->getAll()
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $input = [
                "name" => $request->name,
                "price" => $request->price,
                "description" => $request->content,
                "category_id" => $request->category_id,
                "image" => $request->image,
            ];

            $product = $this->productService->getProductRepository()->save($input, ["id" => $id]);

            $this->attachmentService->getAttachmentRepository()->saveFile(
                $input['image'],
                Product::class,
                $product->id,
                ['attachable_id' => $product->id]
            );

            DB::commit();

            return redirect()->route('products.index')->with('message', 'Update successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function show(int $id)
    {
        return view('backend.products.show', [
            'product' => $this->productService->getProductRepository()->findById($id)
        ]);
    }

    public function destroy(Request $request)
    {
        $productIds = explode(',', $request->input('product_ids'));
        $this->productService->getProductRepository()->delete($productIds);

        return redirect()->back()->with('message', 'Products have been deleted successfully.');
    }
}
