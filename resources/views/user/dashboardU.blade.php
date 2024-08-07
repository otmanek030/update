<!DOCTYPE html>
<html>

<head>
    <title>Example</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>
    <div>
        @php
            include public_path('assets/php/myphp2.php');
        @endphp
    </div>
    <div class="up">
        <div class="title">
            <H1>Herbal Green</H1>
            <h1>i am user</h1>
        </div>
        <div class="sub">
             <p class="para">Green presents a curated collection of preserved plant specimens, highlighting nature's beauty and
                diversity in one unique herbarium.</p>

          {{-- <button class="btn">signup</button> --}}
        </div>

        <style>
            body {
                position: relative;
                height: 70vh;
                left: 60px;
                /* Adjust this value to move more to the left */
                width: calc(100% - 260px);
                background-image: url('{{ asset('assets/image/main.png') }}');
                background-size: cover;
                /* Ensure the image covers the entire background */
                background-position: center;
                /* Center the background image */
                background-repeat: no-repeat;
                /* Prevent the image from repeating */
            }

            .title {

                text-align: center;
                color: #2d4e2d;
                padding: 20px;
                margin: 0;
                font-size: 30px
            }

            .up {
                position: absolute;
                top: 30%;
                right: 56px;
                left: 350px;
            }
            /* .btn{
                top: 15%;
                left: 100px;
                border-radius: 7px;
                font-size: 20px;
                background-color: rgba(134, 115, 52, 0.5);
                color: #000000
            } */
            .sub {

                color: #2d4e2d;
                padding: 20px;
                margin: 0;
                background-color: rgba(224, 214, 181, 0.5);
                border-radius: 15px;
                font-size: 17px
            }
            .para{
                text-align: center;
            }




            h1 {
                margin: 0;
                /* Remove default margin from the h1 tag */
            }

            * {

                font-family: "Libre Baskerville", serif;
                font-weight: 550;
                font-style: normal;

            }
        </style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
            rel="stylesheet">




</body>

</html>
