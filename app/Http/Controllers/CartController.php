<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\BaseService;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Services\MailService;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
        $cartService = app(CartService::class); //create a new CartService object

        if (app(CartService::class)->exists($product->id)) {
            $cartService->update([$product->id => 1], false);
            return redirect()->back();
        }
        $product->image = $product->attachment->file_name ?? null;
        $cartService->insert($product);
        return redirect()->back()->with('success', 'Add Successfully!');    
    }
    
    public function showCart()
    {
        return view('cart.cart');
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
        app(MailService::class)->sendMailCheckoutCart(auth()->user(), session()->get('cart'));
        app(CartService::class)->destroy();
        return redirect('')->with('success', 'Checkout cart successfully');
    }
}
