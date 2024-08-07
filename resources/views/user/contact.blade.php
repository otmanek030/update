<!DOCTYPE html>
<html>

<head>
    <title>Example</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')  }}">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
            border-radius: 8px;
            background: #f4f4f4;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-right: 20px;
        }

        .contact {
            text-align: center;
            color: #2d4e2d;
            padding: 20px;
            margin: 0;
            font-size: 25px;
            max-width: 600px; /* Increased max-width */
            width: 20%; /* Adjusted width */
            height: 420px;
            background-image: url('{{ asset('assets/image/main.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
        }

        input, textarea, button {
            margin-bottom: 10px;
            width: 100%;
            padding: 15px;
            border-top-right-radius: 7px;
            border-bottom-right-radius: 7px;
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
    </style>
</head>

<body>
    <div>
        @php
            include public_path('assets/php/myphp.php');
        @endphp
    </div>

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
</body>

</html>
