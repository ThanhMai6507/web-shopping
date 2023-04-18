<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Services\MailService;

class CartController extends Controller
{
    protected $cartService;
    protected $productService;
    protected $categoryService;

    public function __construct(
        ProductService $productService, 
        CartService $cartService, 
        CategoryService $categoryService
    ) {
        $this->productService = $productService;
        $this->cartService = $cartService;
        $this->categoryService = $categoryService;
    }
    
    public function addToCart(int $id) 
    {
        $product = $this->productService->findById($id);
        $cartService = app(CartService::class); 
        $product->image = $product->attachment->file_name ?? null;
        $cartService->insert($product);

        return redirect()->back()->with('success', 'Add Successfully!');    
    }
    
    public function showCart()
    {
        return view('cart.cart', [
            'carts' => $this->cartService->getByUserId(auth()->id()),
        ]);
    }

    public function showList(Request $request)
    {
        return view('cart.list', [
            'products' => $this->productService->getAll($request->all()),
            'categories' => $this->categoryService->getAll()
        ]);
    }

    public function showDetailProduct(int $id)
    {
        return view('cart.detail_product', [
            'product' => $this->productService->findById($id)
        ]);
    }

    public function updateCart(Request $request)
    {
        app(CartService::class)->update($request->quantity);
        return redirect()->back()->with('success', 'Update Successfully!');
    }

    public function removeItem($id)
    {
        app(CartService::class)->removeItem($id);
        return redirect()->back()->with('success', 'Delete this product successfully');
    }

    public function removeAll()
    {
        app(CartService::class)->destroy();
        return redirect()->back()->with('success', 'Delete all product successfully');
    }

    public function chekoutCart()
    {
        $carts = $this->cartService->getByUserId(auth()->id());
        
        app(MailService::class)->sendMailCheckoutCart(auth()->user(), $carts);
        app(CartService::class)->destroy();

        return view('emails.checkout_cart', ['carts' => $carts]);  
    }
}
