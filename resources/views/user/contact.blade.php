<!DOCTYPE html>
<html>

<head>
    <title>Example</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .contact {
            flex: 1;
            text-align: center;
            color: #2d4e2d;
            padding: 20px;
            font-size: 25px;
            background-image: url('{{ asset('assets/image/main.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;

        }

        .form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Centers the form vertically */
            align-items: center;
            /* Centers the form horizontally */
            padding: 40px;
            background: rgba(197, 193, 193, 0.356);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 1000px;
            height: 100vh;
            /* Restricts the width of the form */
        }

        input,
        textarea,
        button {
            margin-bottom: 10px;
            width: 100%;
            padding: 15px;
            border-radius: 7px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #2d4e2d;
            color: white;
            border: none;
            cursor: pointer;
            padding: 15px;
        }

        button:hover {
            background-color: #648064;
        }

        .contact .title {
            margin-top: 50%;
        }
    </style>
</head>


<body>
    @include('layouts.navbar') 

    <div class="contact">
        <h1 class="title">Contact</h1>
        <p>hello</p>

    </div>

    <div class="form">
        <form id="cardForm" action="{{ route('contact.store') }}" method="POST">
            @csrf
            <input type="text" id="fullName" placeholder="Enter full name" name="full_name" required>
            <input type="email" id="email" placeholder="Enter email" name="email" required>
            <input type="tel" id="tel" placeholder="phone number" name="tel" required>
            <textarea id="comment" placeholder="Enter paragraph text" name="comment" required></textarea>
            <button type="submit">submit</button>
        </form>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


</body>

</html>
