<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Drop Down Top Bar Menu </title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar1">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus'></i>
            <span class="logo_name">AdminPanel</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="products">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Products</span>
                </a>
            </li>
            <li>
                <a href="services">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Service</span>
                </a>
            </li>
            
            <li>
                <a href="contacts">
                    <i class='bx bx-message-square-detail'></i>
                    <span class="link_name">Contact</span>
                </a>
            </li>

            <li>
                <a href="orders">
                    <i class='bx bx-box'></i>
                    <span class="link_name">Order</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Order</a></li>
                </ul>
            </li>

        </ul>
        <div class="profile-details">
            <a class="logout-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i> Logout
            </a>

        </div>
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


    </script>


</body>


</html>

