<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <style>
        .container {
            margin-top: 5%;
        }

        h1, h2, h3 {
            color: #4CAF50;
        }

        hr {
            border-top: 2px solid #4CAF50;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .total-price {
            font-weight: bold;
            color: #4CAF50;
        }

        .order-summary {
            margin-bottom: 50px;
        }

        .no-orders {
            text-align: center;
            margin-top: 50px;
            font-size: 1.2em;
            color: #888;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <div class="container">
        <h1 class="text-center mb-4">Your Orders</h1>
        <hr>

        @if($orders->count() > 0)
            @foreach ($orders as $order)
                <div class="order-summary">
                    <h2>Order ID: {{ $order->id }}</h2>
                    <table class="table table-striped table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderProducts as $orderProduct)
                                <tr>
                                    <td>{{ $orderProduct->product->name }}</td>
                                    <td>{{ $orderProduct->quantity }}</td>
                                    <td>{{ $orderProduct->price }} MAD</td>
                                    <td>{{ $orderProduct->price * $orderProduct->quantity }} MAD</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h3 class="total-price">Total Price: {{ $order->total_price }} MAD</h3>
                </div>
                <hr>
            @endforeach
        @else
            <p class="no-orders">No orders found.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
