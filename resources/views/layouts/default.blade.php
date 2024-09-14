
<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ asset('assets/css/log_sign.css') }}">
   <title>@yield("title","my page login")</title>
   <style>
            body::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: url('{{ asset('assets/image/main.png') }}');
        background-position: center;
        background-size: cover;
        }

   </style>
</head>
<body>
@yield("content")
</body>
</html>
