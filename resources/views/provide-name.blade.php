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

        .create-user {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .create-user h1 {
            font-size: 2.5rem;
            top: 38%;
            position: absolute;
        }

        .create-user form {
            margin-top: 10px;
            display: flex;
            gap: 5px;
            position: relative;
        }

        .create-user button, 
        .create-user input {
            border-radius: 5px !important;
        }

        .create-user button {
            border: 1px solid black;
            padding-block: 5px;
            padding-inline: 10px;
        }

        /* Display errors and success messages */

        .create-user .email-errors,
        .create-user .email-success,
        .create-user .email-fail,
        .create-user .email-wait-response {
            font-size: 1.2rem;
            position: absolute;
            bottom: 3.4rem;
            left: 0;
            padding: .5rem;
            border-radius: 5px;
            white-space: nowrap;
        }

        .create-user .email-errors,
        .create-user .email-fail {
            color: #cb245b;
            background: #f9e6ec;
        }

        .create-user .email-success {
            color: #195133;
            background: #dbf0e1;
        }

        .create-user .email-wait-response {
            color: #195133;
            background: #f4edb1;
            
        }

        .create-user .not-showing {
            display: none;
            /* opacity: 1;
            transition: opacity .5s ease; */
        }

    </style>
</head>
<body>
    <div class="create-user">
        <h1>Provide name before you're able to login</h1>
        {{-- @dd("in the form", $data)    --}}
        <form action="{{ route('create-user', $data) }}" method="POST">
            @csrf
            <div class="email-wait-response not-showing">
                <ul>
                    <li>We're sending you to the Homepage...</li>
                </ul>
            </div>
            {{-- display errors or success message BEGIN --}}
            @if($errors->any())
                <div class="email-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="email-success">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @elseif (session('fail'))
                <div class="email-fail">
                    <ul>
                        <li>{{ session('fail') }}</li>
                    </ul>
                </div>
            @endif
            {{-- display errors or success message END --}}
            <input type="text" name="name" placeholder="Enter name" value="{{ old('name', $data['name'] ?? '') }}">
            <button id="create-user-submit">Submit</button>
        </form>
    </div>
    <script>
        const createUserSubmit = document.querySelector('#create-user-submit');

        // provide name
        createUserSubmit.addEventListener("click", function () {
            const notShowing = document.querySelector('.not-showing');
            notShowing.style.display = "block";   

            // const myTimout = setTimeout(() => {
            //     notShowing.style.opacity= 0;
            // }, 2000);
        });
    </script>
</body>
</html>