<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Services\CartService;
use GuzzleHttp\Psr7\Request;

class CartController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function addToCart(int $id) 
    {
        $product = $this->productRepository->findById($id);
        $cartService = app(CartService::class); //create a new CartService object

        if (app(CartService::class)->exists($product->id)) {
            $cartService->update([$product->id => 1], false);
            return redirect()->back();
        }
        $product->image = $product->attachment->file_name ?? null;
        $cartService->insert($product);
        return redirect()->back();    
    }

    public function showCart()
    {
        return view('cart.cart');
    }

    public function showList()
    {
        return view('cart.list',[
            'products' => $this->productRepository->getAll(),
        ]);
    }

    public function updateCart(Request $request) 
    {
        app(CartService::class)->update($request->quantity);

        return redirect()->back()->with('success', 'Update successfully');
    }
}
