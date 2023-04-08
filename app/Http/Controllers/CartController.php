<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Services\MailService;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    // public function addToCart(int $id) 
    // {
    //     $product = $this->productRepository->findById($id);
    //     $cartService = app(CartService::class); //create a new CartService object

    //     if (app(CartService::class)->exists($product->id)) {
    //         $cartService->update([$product->id => 1], false);
    //         return redirect()->back();
    //     }
    //     $product->image = $product->attachment->file_name ?? null;
    //     $cartService->insert($product);
    //     return redirect()->back()->with('success', 'Add Successfully!');    
    // }

    public function addToCart(Request $request, Product $product)
    {
        $cartService = new CartService();

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if ($cartService->exists($product->id)) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng lên 1
            $cartService->update([$product->id => 1], false);
            return redirect()->back()->with('success', 'Đã cập nhật giỏ hàng thành công!');
        }

        // Nếu sản phẩm chưa tồn tại, thêm sản phẩm vào giỏ hàng
        $cartService->insert($product);
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng thành công!');
    }


    public function showCart()
    {
        $cart = session('cart');

        if ($cart) {
            $cart = $cart->where('user_id', auth()->id());
        } else {
            $cart = collect(); // create empty collection if cart isn't exist
        }
        
        return view('cart.cart', compact('cart'));
    }

    public function showList()
    {
        return view('cart.list', [
            'products' => $this->productRepository->getAll(request()->all()),
            'categories' => $this->categoryRepository->getAll()
        ]);
    }

    public function showDetailProduct(int $id)
    {
        return view('cart.detail_product', [
            'product' => $this->productRepository->findById($id)
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
