<?php
namespace App\Services;

use Illuminate\Support\Arr;

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart') ?? collect();
    }

    public function insert($data) 
    {
        $data->quantity = 1;
        $this->cart->push($data);
        session()->put('cart', $this->cart);
    }

    public function update(array $inputs, $isReplace = true)
    {
        foreach ($inputs as $key => $quantity) {
            $this->cart = $this->cart->map(
                function ($item) use ($isReplace, $key, $quantity) {
                    if ($key == $item->id) {
                        $isReplace ? $item->$quantity = $quantity : $item->quantity += $quantity;
                    }
                    return $item;
                }
            );
        }
        session()->put('cart', $this->cart);
        return;
    }

    public function total()
    {
        return $this->cart->count();
    }

    public function exists($id)
    {
        return $this->cart->where('id', $id)->isNotEmpty();
    }

    public function find($id)
    {
        return $this->cart->where('id', $id);
    }
}
?>
