<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Information</title>
</head>
<body>
    <h1 style="text-align: center;">Thanks {{ Auth::user()->name }}</h1>
    <h2 style="text-align: center;">Information of your cart</h2>
    <br>
    <table id="cart" class="table table-hover table-condesed">
        <tr>
            <th style="width: 10%">Name</th>
            <th style="width: 10%">Image</th>
            <th style="width: 10%">Price</th>
            <th style="width: 10%">Quantity</th>
            <th style="width: 10%">Subtotal</th>
        </tr>
            @php
                $total = 0
            @endphp
                @foreach (session('cart') as $id => $products)
                    @php
                        $total += $products['price'] * $products['quantity']
                    @endphp
                    <tr>
                        <td data-th="Product">{{ $products['name'] }}</td>
                        <td data-th="Image">
                            <img src="{{ asset('storage/attachments/'.$products['image']) }}" style="width: 300px;"/>
                        </td>
                        <td data-th="Price">{{ $products['price'] }}</td>
                        <td data-th="Quantity">{{ $products['quantity'] }}</td>
                        <td data-th="Subtotal">{{ $products['price'] * $products['quantity'] }}</td>
                    </tr>
                @endforeach
            <tr>
                <td class="hidden-xs text-center"><strong>Total: {{ $total }}</strong></td>
            </tr>
    </table>
</body>
</html>