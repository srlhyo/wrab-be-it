<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="color-scheme" content="light dark"> --}}
    <title>Wrabbit Movie Casting</title>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">   --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            height: 100%;
        }

        .login-user {
            display: flex;
            flex-direction: column;
            margin-top: 50px;
            align-items: center;
            height: 100%;
            font-size: 2.5rem;
            gap: 10px;
        }

        /* Display success message */
        .login-user .email-success {
            font-size: unset;
            position: unset;
            bottom: unset;
            left: unset;
            padding: .5rem;
            border-radius: 5px;
            white-space: nowrap;
        }

        .login-user .email-success {
            color: #195133;
            background: #dbf0e1;
        }
    </style>
</head>
<body>
    <div class="login-user">
        <div class="email-success">
            <ul>
                <li>You are logged in. Congratulations!</li>
            </ul>
        </div>
        <a href="{{ route('in-logout') }}">Log out</a>
    </div>
    <dialog>
        <p>This is my modal</p>
    </dialog>
</body>
</html>