<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .product-details {
            display: flex;
            align-items: center;
            gap: 30px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .product-details img {
            border-radius: 12px;
            max-width: 40%;
            height: auto;
            box-shadow: 0 8px 12px rgba(16, 16, 16, 0.2);
        }
        .product-info {
            max-width: 40%;

        }
        .product-info h3 {
            color: #1c541f;
            font-size: 2.5rem;
            margin-bottom: 15px;

        }
        .product-info p {
            color: #666;
            font-size: 1.6rem;
            line-height: 1.6;
        }
        .description-text {
            font-size: 1rem;
            color: #444;
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1.1rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">{{ $product->name }}</h1>
        <div class="product-details">
            <img src="{{ asset('storage/products/' . $product->photo) }}" alt="{{ $product->name }}">
            <div class="product-info">
                <h3>{{ $product->price }} MAD</h3>
                <p>{{ $product->description }}</p>
                <div class="description-text">
                    <p>This image showcases the quality and elegance of the product. Our item is crafted with precision to offer you both functionality and style. Enjoy the exceptional design and materials used in this product.</p>
                </div>
            </div>
        </div>
        <a href="{{ route('shop.index') }}" class="btn btn-primary mt-4">Back to Shop</a>
    </div>
</body>

</html>
