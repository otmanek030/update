<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: "Libre Baskerville", serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
            background-image: url('{{ asset('assets/image/main5.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .sidebar {
        position: fixed;
        top: 0;
        right: -300px;
        width: 300px;
        height: 100%;
        background-color: #f8f9fae8;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        transition: 0.3s;
        padding: 20px;
        z-index: 9999;
    }

    .sidebar.show {
        right: 0;
    }

    .selected-product {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .selected-product-image img {
        width: 50px;
        height: auto;
        margin-right: 10px;
        border-radius: 5px;
    }

    .selected-product-info {
        flex-grow: 1;
    }

    .sidebar-total {
        margin-top: 20px;
        font-size: 18px;
        font-weight: bold;
    }

    </style>
</head>
<body>
    @php
        include public_path('assets/php/myphp2.php');
    @endphp
    <div class="container">
        <div class="title">
            <h1>Shop</h1>
            <hr>
        </div>
        <div class="produit">
            @foreach ($products as $product)
                <div class="card" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" data-photo="{{ asset('storage/products/' . $product->photo) }}">
                    <div class="card-img-top" style="background-image: url('{{ asset('storage/products/' . $product->photo) }}');" onclick="goToProductDetail('{{ $product->id }}')"></div>
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>
                            <h3>{{ $product->price }} MAD</h3>
                        </p>
                        <div class="counter-container">
                            <button class="counter-btn minus" data-id="{{ $product->id }}">-</button>
                            <span class="counter" data-id="{{ $product->id }}">0</span>
                            <button class="counter-btn plus" data-id="{{ $product->id }}">+</button>
                        </div>
                        <div class="butt">
                            <button class="btn-primary select-product" role="button"><span class="select">Select</span></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

       <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <button class="close-sidebar" onclick="toggleSidebar()">×</button>
            <h2>Selected Products</h2>
            <div id="selected-products-container">
                <!-- Selected products will be inserted here by JavaScript -->
            </div>
            <div class="sidebar-total">
                <h3>Total: <span id="total-price">0.00 MAD</span></h3>
            </div>
        </div>

        <!-- Toggle Sidebar Button -->
        <button class="toggle-sidebar" onclick="toggleSidebar()">
            <i class="bi bi-plus-square-fill"></i>
        </button>

        <!-- Place Order Form -->
        <form id="order-form" method="POST" action="{{ route('shop.store') }}">
            @csrf
            <input type="hidden" name="total_price" id="hidden-total-price">
            <input type="hidden" name="products" id="hidden-products">
            <button type="submit" class="btn btn-primary submit-order-btn" class="place">Place Order</button>
        </form>
    </div>
    <div id="contact-form-popup" class="contact-form-popup">
        <div class="contact-form-content">
            <h5>Contact Information</h5>
            <form id="contact-form">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>

                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>

                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>

                <button type="button" class="btn-primary" id="submit-contact-form">Done</button>
            </form>
        </div>
    </div>

    <script>
        let selectedProducts = [];
        const sidebarBody = document.getElementById('selected-products-body');
        const totalPriceElement = document.getElementById('total-price');

        function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    // Show or hide the sidebar based on the presence of products with quantity > 0
    if (selectedProducts.some(product => product.quantity > 0)) {
        sidebar.classList.toggle("show");
    } else {
        sidebar.classList.remove("show");
    }
}

document.querySelectorAll('.select-product').forEach(button => {
    button.addEventListener('click', function() {
        const card = this.closest('.card');
        const productId = card.getAttribute('data-id');
        const productName = card.getAttribute('data-name');
        const productPrice = parseFloat(card.getAttribute('data-price'));
        const productPhoto = card.getAttribute('data-photo');
        const quantity = parseInt(card.querySelector(`.counter[data-id="${productId}"]`).textContent);

        if (!selectedProducts.find(p => p.id === productId)) {
            selectedProducts.push({ id: productId, name: productName, price: productPrice, photo: productPhoto, quantity });
        } else {
            selectedProducts = selectedProducts.map(p => {
                if (p.id === productId) {
                    return { ...p, quantity };
                }
                return p;
            });
        }

        updateSidebar();  // Ensure the sidebar content is updated

        // Immediately show the sidebar if any product is selected
        const sidebar = document.getElementById("sidebar");
        if (selectedProducts.some(product => product.quantity > 0)) {
            sidebar.classList.add("show");
        }
    });
});

        document.querySelectorAll('.counter-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const counter = document.querySelector(`.counter[data-id="${productId}"]`);
                let currentCount = parseInt(counter.textContent);

                if (this.classList.contains('plus')) {
                    counter.textContent = currentCount + 1;
                } else if (this.classList.contains('minus') && currentCount > 0) {
                    counter.textContent = currentCount - 1;
                }
            });
        });

        function updateSidebar() {
    const container = document.getElementById('selected-products-container');
    const sidebar = document.getElementById('sidebar');
    container.innerHTML = '';
    let totalPrice = 0;
    let hasProducts = false;

    selectedProducts.forEach(product => {
        if (product.quantity > 0) {
            hasProducts = true;
            const productElement = document.createElement('div');
            productElement.classList.add('selected-product');
            productElement.innerHTML = `
                <div class="selected-product-image">
                    <img src="${product.photo}" alt="${product.name}">
                </div>
                <div class="selected-product-info">
                    <h5>${product.name}</h5>
                    <p>Quantity: ${product.quantity}</p>
                    <p>Price: ${(product.price * product.quantity).toFixed(2)} MAD</p>
                </div>
            `;
            container.appendChild(productElement);
            totalPrice += product.price * product.quantity;
        }
    });

    totalPriceElement.textContent = `${totalPrice.toFixed(2)} MAD`;
    document.getElementById('hidden-total-price').value = totalPrice.toFixed(2);
    document.getElementById('hidden-products').value = JSON.stringify(selectedProducts);

    if (hasProducts) {
        sidebar.classList.add('show');
    } else {
        sidebar.classList.remove('show');
    }
}



        function goToProductDetail(productId) {
            window.location.href = `/product/${productId}`;
        }

        document.querySelector('.submit-order-btn').addEventListener('click', function(event) {
            event.preventDefault();
            const totalSelectedProducts = selectedProducts.length;

            if (totalSelectedProducts > 0) {
                // Show the contact form popup
                document.getElementById('contact-form-popup').style.display = 'flex';
            } else {
                alert('Please select at least one product before placing an order.');
            }
        });

        document.getElementById('submit-contact-form').addEventListener('click', function() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;

            if (name && email && phone) {
                document.getElementById('order-form').submit();
            } else {
                alert('Please fill out all fields in the contact form.');
            }
        });
    </script>
</body>
</html>
