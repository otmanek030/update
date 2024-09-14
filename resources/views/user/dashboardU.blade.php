<!DOCTYPE html>
<html>

<head>
    <title>Herbal Green</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <div>
        @php
            include public_path('assets/php/myphp2.php');
        @endphp
    </div>

    <div class="video-container">
        <video autoplay muted loop>
            <source src="{{ asset('assets/image/vid.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <button class="styled-button">About Us</button>
    </div>

    <div class="up">
        <div class="title">
            <h1>Herbal Green</h1>
        </div>
        <div class="sub">
            <p class="para">Green presents a curated collection of preserved plant specimens, highlighting nature's beauty and diversity in one unique herbarium.</p>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <style>
        body {
            height: 100vh;
            margin: 0;
            font-family: 'Libre Baskerville', serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('{{ asset('assets/image/main.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Video container styling */
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 64%;
            height: 64%;
            overflow: hidden;
            z-index: 1;
            background-color: rgba(224, 214, 181, 0.671); /* Semi-transparent background */
            margin-left: 45%;
            margin-top: 19%;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .video-container video {
            width: 80%;
            height: 80%;
            object-fit: cover;
            border-radius: 40px;
            padding: 2%;
            margin-right: 20%;

        }

        /* Stylish button */
        .styled-button {
            background-color: #57561a;
            color: #fff;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-right: 84%;
        }

        .styled-button:hover {
            background-color: #614c13;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-3px);
        }

        .styled-button:focus {
            outline: none;
        }

        /* Container for title and sub */
        .up {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            text-align: center;
            max-width: 700px;
            background-color: rgba(224, 214, 181, 0.726); /* Semi-transparent background */
            border-radius: 20px;
            margin-bottom: 300px;
            margin-right: 700px;
            z-index: -1;
        }

        /* Styling for title */
        .title h1 {
            margin: 0;
            color: #2d4e2d;
            font-size: 48px;
            letter-spacing: 2px;
        }

        /* Styling for subtitle section */
        .sub {
            margin-top: 20px;
            padding: 20px;
            border-radius: 15px;
            font-size: 18px;
        }

        /* Centered paragraph */
        .para {
            text-align: center;
            color: #2d4e2d;
            line-height: 1.6;
        }
    </style>

</body>

</html>
