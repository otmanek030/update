<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/products_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styleA.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>
        * {

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


    </style>
</head>

<body>
    @php
    include public_path('assets/php/myphp.php');
    @endphp

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

    <button class="toggle-btn" id="add" onclick="toggleSidebar()">Add Product</button>


    <div class="container" id="main-container">
        <div class="title">
            <hr>
        </div>

        <div class="filter-buttons">
            <button onclick="filterProducts('Organic Spices')">Organic Spices</button>
            <button onclick="filterProducts('Natural Skincare Products')">Natural Skincare Products</button>
            <button onclick="filterProducts('Organic Herbal Teas')">Organic Herbal Teas</button>
            <button onclick="filterProducts('Essential Oils')">Essential Oils</button>
            <button onclick="filterProducts('All')">Show All</button>
        </div>


        <div class="produit">
            @foreach ($products as $product)
                <div class="card" data-type="{{ $product->type }}">
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
        <form id="cardForm" class="form" action="{{ route('product.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="text" id="paragraphText" placeholder="Enter product name" name="pro_name" required>

            <input type="file" id="pictureUrl" accept="image/jpeg, image/png, image/jpg" name="image" required>

            <input type="number" id="price" placeholder="Enter product price" name="price" required
                min="0" step="0.5">

            <div class="radio-group">
                <label>
                    <input type="radio" name="type" value="Organic Spices" required>
                    Organic Spices
                </label>
                <label>
                    <input type="radio" name="type" value="Natural Skincare Products" required>
                    Natural Skincare Products
                </label>
                <label>
                    <input type="radio" name="type" value="Organic Herbal Teas" required>
                    Organic Herbal Teas
                </label>
                <label>
                    <input type="radio" name="type" value="Essential Oils" required>
                    Essential Oils
                </label>
            </div>

            <button type="submit">Add New Product</button>
        </form>
    </div>


    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const container = document.getElementById('main-container');
            const add = document.getElementById('add');
            sidebar.classList.toggle('show');
            container.classList.toggle('with-sidebar');
            add.classList.toggle('with-sidebar');
        }

        function filterProducts(type) {
            const cards = document.querySelectorAll('.produit .card');
            cards.forEach(card => {
                if (card.getAttribute('data-type') === type || type === 'All') {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>


</body>

</html>
