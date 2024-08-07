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
    <div class="topbar close">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus'></i>
            <span class="logo_name">CodingLab</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="open">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Category</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-book-alt'></i>
                        <span class="link_name">Shop</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Shop</a></li>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Login Form</a></li>
                    <li><a href="#">Card Design</a></li>
                </ul>
            </li>
            <li>
                <a href="service">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">Service</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="service">Service</a></li>
                </ul>
            </li>
            <li>
                <a href="aboutus">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">About us</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">About us</a></li>
                </ul>
            </li>
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
                <a href="signin">
                    <i class='bx bx-history'></i>
                    <span class="link_name">Sign in</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="signin">Sign in </a></li>
                </ul>
            </li>
            <li>
                <a href="login">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Log in</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="login">Log in</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <i class='bx bx-log-out'></i>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let topbar = document.querySelector(".topbar");
        let topbarBtn = document.querySelector(".bx-menu");
        console.log(topbarBtn);
        topbarBtn.addEventListener("click", () => {
            topbar.classList.toggle("close");
        });
    </script>
</body>

</html>

