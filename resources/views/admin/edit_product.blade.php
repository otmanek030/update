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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            color: #2d4e2d;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group input[type="number"],
        .form-group select,
        .form-group button {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group button {
            background-color: #2d4e2d;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .form-group button:hover {
            background-color: #648064;
        }

        .form-group img {
            display: block;
            margin: 0 auto 20px auto;
            max-width: 100px;
            height: auto;
            border-radius: 6px;
        }

        .form-group .input-file-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-group .input-file-label {
            flex-grow: 1;
            margin-right: 10px;
        }

        .form-group .input-file {
            flex-shrink: 0;
            width: 120px;
            padding: 8px;
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
            <div class="form-group">
                <label for="paragraphText">Product Name</label>
                <input type="text" id="paragraphText" name="pro_name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="pictureUrl">Product Image</label>
                <div class="input-file-container">
                    <input type="file" id="pictureUrl" name="image" accept="image/jpeg, image/png, image/jpg" class="input-file">
                </div>
                <img src="{{ asset('storage/products/' . $product->photo) }}" alt="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" required min="0" step="0.01">
            </div>

            <!-- Add Product Type -->
            <div class="form-group">
                <label for="type">Product Type</label>
                <select id="type" name="type" required>
                    <option value="Organic Spices" {{ $product->type == 'Organic Spices' ? 'selected' : '' }}>Organic Spices</option>
                    <option value="Natural Skincare Products" {{ $product->type == 'Natural Skincare Products' ? 'selected' : '' }}>Natural Skincare Products</option>
                    <option value="Organic Herbal Teas" {{ $product->type == 'Organic Herbal Teas' ? 'selected' : '' }}>Organic Herbal Teas</option>
                    <option value="Essential Oils" {{ $product->type == 'Essential Oils' ? 'selected' : '' }}>Essential Oils</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Update Product</button>
            </div>
        </form>
    </div>
</body>

</html>
