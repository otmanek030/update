<!DOCTYPE html>
<html lang="en">
<head>

    <title>Our Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/servicesClient.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <style>
        body {

            background-color: #f0f9f4;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .services-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: center;
            max-width: 1200px;
            width: 100%;
        }

        .service-card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 350px;
            padding: 30px;
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background-image: linear-gradient(to bottom right, #e0f4e9, #d8ebd8);
            cursor: pointer;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .service-image {
            width: 100%;
            height: 250px;
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .service-title {
            font-size: 22px;
            color: #2d4e2d;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .service-description {
            font-size: 16px;
            color: #555;
        }

        .services {
            margin-top: 5%;
            text-align: center;
            color: #2d4e2d;
        }

        .services h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #2d4e2d;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 20px;
            padding: 40px;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: zoomIn 0.3s ease;
        }

        .modal-image {
            width: 100%;
            height: 300px;
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 28px;
            color: #2d4e2d;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .modal-description {
            font-size: 18px;
            color: #555;
        }

        .close-btn {
            background-color: #2d4e2d;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }

        @keyframes zoomIn {
            from {transform: scale(0);}
            to {transform: scale(1);}
        }
    </style>


</head>

<body>
    @include('layouts.navbar')
    <div class="services">
        <h1>Our Services</h1>
    </div>
    <div class="services-container">
        @foreach($services as $service)
        <div class="service-card" onclick="openModal('{{ asset('storage/' . $service->image) }}', '{{ $service->title }}', '{{ $service->description }}')">
            <div class="service-image" style="background-image: url('{{ asset('storage/' . $service->image) }}');"></div>
            <h3 class="service-title">{{ $service->title }}</h3>
            <p class="service-description">{{ $service->description }}</p>
        </div>
        @endforeach
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


    <!-- Modal -->
    <div id="serviceModal" class="modal">
        <div class="modal-content">
            <div id="modalImage" class="modal-image"></div>
            <h3 id="modalTitle" class="modal-title"></h3>
            <p id="modalDescription" class="modal-description"></p>
            <button class="close-btn" onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        function openModal(image, title, description) {
            document.getElementById('modalImage').style.backgroundImage = 'url(' + image + ')';
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalDescription').innerText = description;
            document.getElementById('serviceModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('serviceModal').style.display = 'none';
        }
    </script>
</body>
</html>
