<!DOCTYPE html>
<html>

<head>
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles2.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .topbar {
        left: 75%;
        }

        .topbar .nav-links li a {

        color: #ffffff;

        }


        .content {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            color: #2d4e2d;
            font-size: 25px;
        }

        .content video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .about {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            max-width: 900px;
            margin: auto;
        }

        .about h2 {
            font-size: 36px;
            color: #2d4e2d;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: justify;
        }

        .about button {
            padding: 12px 24px;
            background-color: #2d4e2d;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .about button:hover {
            background-color: #648064;
        }
    </style>
</head>

<body>
    <div class="topbar close">

        <ul class="nav-links">
            <li>
                <a href="/">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Category</a></li>
                </ul>
            </li>
            <li>
                <a href="login">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">login</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">login</a></li>
                </ul>
            </li>
            <li>
                <a href="sigmup">
                    <i class='bx bx-compass'></i>
                    <span class="link_name">signup</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">signup</a></li>
                </ul>
            </li>

    </div>

    <div class="content">
        <video autoplay muted loop>
            <source src="{{ asset('assets/image/vid2.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>


    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</body>

</html>
