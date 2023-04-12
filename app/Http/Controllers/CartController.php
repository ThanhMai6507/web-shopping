<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Services\MailService;

class CartController extends Controller
{
    protected $baseService;

    public function __construct(BaseService $baseService)
    {
        $this->baseService = $baseService;
    }
    
    public function addToCart(int $id) 
    {
        $product = $this->baseService->getProductRepository()->findById($id);
        $cartService = app(CartService::class); 
        $product->image = $product->attachment->file_name ?? null;
        $cartService->insert($product);

        return redirect()->back()->with('success', 'Add Successfully!');    
    }
    
    public function showCart()
    {
        return view('cart.cart', [
            'carts' => $this->baseService->getCartRepository()->getByUserId(auth()->id()),
        ]);
    }

    public function showList()
    {
        return view('cart.list', [
            'products' => $this->baseService->getProductRepository()->getAll(request()->all()),
            'categories' => $this->baseService->getCategoryRepository()->getAll()
        ]);
    }

    public function showDetailProduct(int $id)
    {
        return view('cart.detail_product', [
            'product' => $this->baseService->getProductRepository()->findById($id)
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
        $carts = $this->baseService->getCartRepository()->getByUserId(auth()->id());
        
        app(MailService::class)->sendMailCheckoutCart(auth()->user(), $carts);
        app(CartService::class)->destroy();

        return view('emails.checkout_cart', ['carts' => $carts]);  
    }
}
