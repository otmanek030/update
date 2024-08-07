<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Libre Baskerville", serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            color: #2d4e2d;
            margin-bottom: 20px;
        }

        .form input,
        .form button {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form button {
            background-color: #2d4e2d;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form button:hover {
            background-color: #648064;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>Edit Product</h1>
        </div>
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" id="paragraphText" placeholder="Enter product name" name="pro_name" value="{{ $product->name }}" required>
            <input type="file" id="pictureUrl" accept="image/jpeg, image/png, image/jpg" name="image">
            <input type="number" id="price" placeholder="Enter product price" name="price" required min="0" step="0.01" required>
            <button type="submit">Update Product</button>
        </form>
    </div>
</body>

</html>
