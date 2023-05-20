<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Information</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <br>
    <h1 class="display-4" style="text-align: center;">Thanks {{ Auth::user()->name }}</h1>
    <h4 style="text-align: center; margin-bottom: 30px">Information of your cart</h4>
    <br>
    <table id="cart" class="table table-hover table-condesed" style="width:80%; margin:auto">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <tr>
            <th style="width: 10%">Name</th>
            <th style="width: 10%">Image</th>
            <th style="width: 10%">Price</th>
            <th style="width: 10%">Quantity</th>
            <th style="width: 10%">Subtotal</th>
        </tr>
        @php
            $total = 0;
        @endphp
        @foreach ($carts as $cart)
            @php
                $subtotal = $cart->product->price * $cart->quantity;
                $total += $subtotal;
            @endphp
            <tr>
                <td data-th="Product">{{ $cart->product->name }}</td>
                <td data-th="Image">
                    <img src="{{ asset('storage/attachments/' . $cart->product->attachment?->file_name) }}"
                        style="width: 200px;" />
                </td>
                <td data-th="Price">{{ $cart->product->price }}</td>
                <td data-th="Quantity">{{ $cart->quantity }}</td>
                <td data-th="Subtotal">{{ $subtotal }}</td>
            </tr>
        @endforeach
        <tr>
            <td class="hidden-xs text-center"><strong>Total: {{ $total }}</strong></td>
        </tr>
    </table>
</body>

</html>
