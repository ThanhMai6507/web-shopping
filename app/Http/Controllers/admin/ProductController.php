<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $baseService;

    public function __construct(BaseService $baseService)
    {
        $this->baseService = $baseService;
    }

    public function index(Request $request)
    {
        return view('backend.products.index', [
            'products' => $this->baseService->getProductRepository()->getAll($request->all()),
            'categories' => $this->baseService->getCategoryRepository()->getAll(),
        ]);
    }

    public function create()
    {
        return view('backend.products.create', [
            'categories' => $this->baseService->getCategoryRepository()->getAll(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $input = request()->all();
            $product = $this->baseService->getProductRepository()->save($input);
            
            $this->baseService->getAttachmentRepository()->saveFile(
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
            'product' => $this->baseService->getProductRepository()->findById($id),
            'categories' => $this->baseService->getCategoryRepository()->getAll()
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $input = request()->all();
            $product = $this->baseService->getProductRepository()->save($input, ["id" => $id]);
            
            $this->baseService->getAttachmentRepository()->saveFile(
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
            'product' => $this->baseService->getProductRepository()->findById($id)
        ]);
    }

    public function destroy(int $id)
    {
        $this->baseService->getProductRepository()->delete($id);
        return redirect()->route('products.index')->with('message', 'Delete successfully!');
    }
}
