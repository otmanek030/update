<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Drop Down Top Bar Menu </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    </style>
</head>

<body>
    <div class="topbar close">

        <ul class="nav-links">

            <li>
                <div class="iocn-link">
                    <a href="shop">
                        <i class='bx bx-book-alt'></i>
                        <span class="link_name">Shop</span>
                    </a>
                </div>
            </li>
            <li>
                <a href="services">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">Service</span>
                </a>


            <li>
                <a href="contact">
                    <i class='bx bx-compass'></i>
                    <span class="link_name">Contact</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Contact</a></li>
                </ul>
            </li>
            <li>
            <ul><a class="logout-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i> Logout
            </a></ul>
            </li>


    </div>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (let i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let topbar = document.querySelector(".topbar");
        let topbarBtn = document.querySelector(".bx-menu");
        if (topbarBtn) {
            topbarBtn.addEventListener("click", () => {
                topbar.classList.toggle("close");
            });
        }




    </script>
</body>

</html>
