<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Services</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styleA.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .home-section {
            margin-left: 250px;
            padding: 20px;
            margin-left: 180px;
        }

        .services {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
            justify-content: space-between;
            margin-left: 80px;
        }

        .service-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: calc(50% - 10px);
            box-sizing: border-box;
            text-align: center;
            transition: transform 0.3s;
            position: relative;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-image {
            width: 100%;
            height: 300px;
            background-size: cover;
            background-position: center;
            border-radius: 9px;
            margin-bottom: 15px;
        }

        .service-card h3 {
            margin: 10px 0;
            color: #2d4e2d;
            font-size: 22px;
        }

        .service-card p {
            color: #666;
            cursor: pointer;
            transition: color 0.3s;
        }

        .service-card p:hover {
            color: #2d4e2d;
        }

        .delete-btn {
            padding: 10px 15px;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #c9302c;
        }

        .add-service-form {
            margin-bottom: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left: 80px;
        }

        .add-service-form input,
        .add-service-form textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .add-service-form button {
            padding: 10px 15px;
            background-color: #2d4e2d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-service-form button:hover {
            background-color: #1e3a1e;
        }
    </style>
</head>

<body>

    <body>
        @php
            include public_path('assets/php/myphp.php');
        @endphp

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <section class="home-section">
            <!-- Form for adding a new service -->
            <div class="add-service-form">
                <h2>Add New Service</h2>
                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Service Title" required>
                    <textarea name="description" placeholder="Service Description" rows="4" required></textarea>
                    <input type="file" name="image" accept="image/*" required>
                    <button type="submit">Add Service</button>
                </form>
            </div>

            <!-- Display existing services -->
            <div class="services">
                @foreach ($services as $service)
                    <div class="service-card" data-id="{{ $service->id }}">
                        <div class="service-image"
                            style="background-image: url('{{ asset('storage/' . $service->image) }}');"></div>
                        <h3>{{ $service->title }}</h3>
                        <p class="editable" data-id="{{ $service->id }}">{{ $service->description }}</p>
                        <button class="delete-btn" onclick="deleteService({{ $service->id }})">Delete</button>
                    </div>
                @endforeach
            </div>
        </section>

        <script>
            function deleteService(id) {
                if (confirm('Are you sure you want to delete this service?')) {
                    fetch(`/admin/services/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Remove the service card from the DOM
                                document.querySelector(`.service-card[data-id="${id}"]`).remove();
                            } else {
                                alert('Error deleting service');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Error deleting service');
                        });
                }
            }

            document.querySelectorAll('.editable').forEach(item => {
                item.addEventListener('click', function() {
                    let p = this;
                    let originalText = p.innerText;
                    let input = document.createElement('textarea');
                    input.value = originalText;
                    input.style.width = '100%';
                    input.style.boxSizing = 'border-box';

                    p.innerHTML = '';
                    p.appendChild(input);
                    input.focus();

                    input.addEventListener('blur', function() {
                        let updatedText = input.value;
                        let id = p.getAttribute('data-id');

                        fetch(`/admin/services/${id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    description: updatedText
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    p.innerHTML = updatedText;
                                } else {
                                    p.innerHTML = originalText;
                                    alert('Error updating description');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                p.innerHTML = originalText;
                                alert('Error updating description');
                            });
                    });
                });
            });
        </script>
    </body>

</html>
