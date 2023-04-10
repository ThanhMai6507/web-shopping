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
use PDOException;

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
        DB::beginTransaction();

        try {
            $input = request()->all();
            $product = $this->productRepository->save($input);
            
            $this->attachmentRepository->saveFile(
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
            'product' => $this->productRepository->findById($id),
            'categories' => $this->categoryRepository->getAll()
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $input = request()->all();
            $product = $this->productRepository->save($input, ["id" => $id]);
            
            $this->attachmentRepository->saveFile(
                $input['image'], 
                Product::class, 
                $product['id'], 
                $id
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
            'product' => $this->productRepository->findById($id)
        ]);
    }

    public function destroy(int $id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('products.index')->with('message', 'Delete successfully!');
    }
}
