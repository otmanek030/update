<!DOCTYPE html>
<html>

<head>
    <title>Admin Contacts</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styleA.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>

        .container {
            max-width: 1200px;
            margin: 0 auto;

        }

        .container .h1{
            margin-left: 200px;
        }

        .search-bar {
            margin-bottom: 20px;
            text-align: center;
            margin-left: 200px;
        }

        .search-bar input[type="text"] {
            width: 80%;
            padding: 10px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contact-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            display: flex;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
            margin-left: 200px;
        }

        .contact-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .contact-card .details, .contact-card .comment {
            flex: 1;
            padding: 20px;
        }

        .contact-card .details {
            background: #f8f9fa;
            border-radius: 8px;
            margin-right: 10px;
        }

        .contact-card .comment {
            background: #d1e7dd;
            border-radius: 8px;
            margin-left: 10px;
        }

        .contact-card h2 {
            margin-top: 0;
            color: #343a40;
            font-size: 28px;
            font-weight: 600;
        }

        .contact-card p {
            margin: 10px 0;
            color: #495057;
            font-size: 18px;
            line-height: 1.6;
        }

        .contact-card .field {
            font-weight: 700;
            color: #007bff;
            font-size: 20px;
        }

        .container h1 {
            text-align: center;
            color: #343a40;
            font-size: 36px;
            margin-bottom: 40px;
            font-weight: 700;
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

    <div class="container">
        <h1>Contacts List</h1>
        {{-- <div class="search-bar">
            <form action="{{ route('contact.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search contacts..." value="{{ request()->get('search') }}">
            </form>
        </div> --}}
        @foreach($contacts as $contact)
            <div class="contact-card">
                <div class="details">
                    <h2>Contact Details</h2>
                    <p><span class="field">Full Name:</span> {{ $contact->fullname }}</p>
                    <p><span class="field">Email:</span> {{ $contact->email }}</p>
                    <p><span class="field">Phone:</span> {{ $contact->phone }}</p>
                    <p><span class="field">Created At:</span> {{ $contact->created_at->format('d-m-Y H:i:s') }}</p>
                </div>
                <div class="comment">
                    <p><span class="field">Comment:</span> {{ $contact->comment }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
