<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Libre Baskerville", serif;

            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            background-image: url('{{ asset('assets/image/download.jpg') }}');
            background-size: cover;
            /* Ensure the image covers the entire background */
            background-position: center;
            /* Center the background image */
            background-repeat: no-repeat;
            /* Prevent the image from repeating */
        }

        .container {
            width: calc(100% - 300px);
            /* Adjusted width for the main content */
            max-width: 1200px;
            padding: 40px;
        }

        .title {
            text-align: center;
            color: #2d4e2d;
            margin-bottom: 40px;
        }

        .produit {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 70px;
        }

        .card {
            width: 280px;
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
            right: 0;
            top: 0;
            width: 300px;
            /* Fixed width for the sidebar */
            height: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .close-sidebar {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            background: none;
            border: none;
            cursor: pointer;
            color: #2d4e2d;
        }

        .form input,
        .form button {
            width: calc(100% - 20px);
            /* Adjust width for padding */
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

        .toggle-sidebar {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #2d4e2d;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            cursor: pointer;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <button class="toggle-sidebar" onclick="toggleSidebar()">☰</button>

    <div class="container">
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

    <div class="sidebar">
        <button class="close-sidebar" onclick="toggleSidebar()">×</button>
        <form id="cardForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" id="paragraphText" placeholder="Enter product name" name="pro_name" required>
            <input type="file" id="pictureUrl" accept="image/jpeg, image/png, image/jpg" name="image" required>
            <input type="number" id="price" placeholder="Enter product price" name="price" required
                min="0" step="0.5" required>
            <button type="submit">Add New Product</button>
        </form>
    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>

</html>
