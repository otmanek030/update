<!DOCTYPE html>
<html>

<head>
    <title>Orders</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styleA.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>
       

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            padding: 25px;
        }

        h1 {
            text-align: center;
            color: #1b5e20;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table, th, td {
            border: 1px solid #a5d6a7;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #c8e6c9;
            color: #388e3c;
        }

        tr:nth-child(even) {
            background-color: #f1f8e9;
        }

        tr:hover {
            background-color: #dcedc8;
        }


    </style>
</head>

<body>
    <body>
        @php
        include public_path('assets/php/myphp.php');
        @endphp

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="container">
        <h1>All Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>Phone Number</th>
                    <th>Products</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
<td>
    @if ($order->user)
        {{ $order->user->name ?? 'N/A' }}
    @else
        N/A
    @endif
</td>
<td>
    @if ($order->user)
        {{ $order->user->phone_number ?? 'N/A' }}
    @else
        N/A
    @endif
</td>

                    <td>
                        <ul>
                            @forelse ($order->products as $product)
                            <li>{{ $product->name }} - Quantity: {{ $product->pivot->quantity }}</li>
                            @empty
                            <li>No products found for this order.</li>
                            @endforelse
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
