<?php
namespace App\Services;

use App\Models\Cart;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $userId = auth()->id();
        $this->cart = Cart::where('user_id', $userId)->get() ?? collect();
        $this->cart = $cart;
    }

    public function insert($product)
    {
        Cart::updateOrCreate(
            [
                'product_id' => $product->id,
                'user_id' => auth()->id()
            ],
            ['quantity' => DB::raw('quantity + 1')]
        );
    }

    public function update(array $inputs, $isReplace = true)
    {
        foreach ($inputs as $key => $quantity) {
            $cart = Cart::where('id', $key)->firstOrFail();
            $isReplace ? $cart->quantity = $quantity : $cart->quantity += $quantity;
            $cart->save();
        }
    }

    public function total()
    {
        return Cart::where('user_id', auth()->id())->count();
    }

    public function exists($id)
    {
        return Cart::where('user_id', auth()->id())->where('product_id', $id)->exists();
    }

    public function find($id)
    {
        return Cart::where('user_id', auth()->id())->where('product_id', $id)->first();
    }

    public function removeItem($id)
    {
        Cart::where('user_id', auth()->id())->where('product_id', $id)->delete();
    }

    public function destroy()
    {
        Cart::where('user_id', auth()->id())->delete();
    }

    public function getByUserId(int $userId)
    {
        return $this->cart->getByUserId($userId);
    }
}
