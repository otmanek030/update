<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Libre Baskerville", serif;
            min-height: 100vh;
            background-image: url('{{ asset('assets/image/download.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            padding: 40px;
            margin: auto;
            transition: margin-right 0.3s;
        }

        .container.with-sidebar {
            margin-right: 300px;
        }

        .title {
            text-align: center;
            color: #2d4e2d;
            margin-bottom: 40px;
        }

        .produit {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .card {
            width: calc(33.333% - 20px);
            border-radius: 30px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
            overflow: hidden;
            background-color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-radius: 30px;
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .card-body {
            padding: 25px;
            margin-top: -15px;
            text-align: center;
        }

        .btn-primary {
            border-radius: 50px;
            width: 120px;
            background-color: #2d4e2d;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: black;
        }

        h3,
        h5 {
            color: rgb(0, 91, 228);
        }

        .sidebar {
            position: fixed;
            right: -300px;
            top: 0;
            width: 300px;
            height: 100%;
            padding: 20px;
            background-color: #fff;
            border-left: 1px solid #ccc;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: right 0.3s;
        }

        .sidebar.show {
            right: 0;
        }

        .sidebar .form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .sidebar input,
        .sidebar button {
            width: calc(100% - 40px);
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .sidebar input {
            font-size: 16px;
        }

        .sidebar button {
            background-color: #2d4e2d;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sidebar button:hover {
            background-color: #648064;
        }

        .toggle-btn {
            position: fixed;
            right: 20px;
            top: 20px;
            padding: 10px 20px;
            background-color: #2d4e2d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1001;
        }

        .toggle-btn:hover {
            background-color: #648064;
        }
    </style>
</head>

<body>

    <button class="toggle-btn" onclick="toggleSidebar()">Add Product</button>

    <div class="container" id="main-container">
        <div class="title">
            <h1>Welcome to our shop</h1>
            <hr>
        </div>

        <div class="produit">
            @foreach ($products as $product)
                <div class="card">
                    <div class="card-img-top"
                        style="background-image: url('{{ asset('storage/products/' . $product->photo) }}');"></div>
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>
                        <h3>{{ $product->price }} MAD</h3>
                        </p>
                        <form action="{{ route('product.edit', $product->id) }}" method="GET">
                            <button type="submit" class="btn-primary">Modify</button>
                        </form>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-primary">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="sidebar" id="sidebar">
        <form id="cardForm" class="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" id="paragraphText" placeholder="Enter product name" name="pro_name" required>
            <input type="file" id="pictureUrl" accept="image/jpeg, image/png, image/jpg" name="image" required>
            <input type="number" id="price" placeholder="Enter product price" name="price" required min="0" step="0.5">
            <button type="submit">Add New Product</button>
        </form>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const container = document.getElementById('main-container');
            sidebar.classList.toggle('show');
            container.classList.toggle('with-sidebar');
        }
    </script>

</body>

</html>
