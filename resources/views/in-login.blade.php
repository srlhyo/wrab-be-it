<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="color-scheme" content="light dark"> --}}
    <title>Wrabbit Movie Casting</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

    </style>
</head>
<body>
    <input type="hidden" id="createUser" name="createUser" value="{{ session('name')}}">
    <dialog data-modal class="create-user-modal">
        <form class="close-modal" action="{{ route('/') }}" method="dialog">
            @csrf
            <input type="hidden" name="close_button" value="close modal">
            <button>
                <svg viewBox="0 0 50 50" width="25px" height="25px"><path d="M 25 8 C 15.611 8 8 15.611 8 25 C 8 34.389 15.611 42 25 42 C 34.389 42 42 34.389 42 25 C 42 15.611 34.389 8 25 8 z M 25 9 C 33.837 9 41 16.163 41 25 C 41 33.837 33.837 41 25 41 C 16.163 41 9 33.837 9 25 C 9 16.163 16.163 9 25 9 z M 18.990234 18.490234 C 18.862234 18.490234 18.734219 18.539219 18.636719 18.636719 C 18.441719 18.831719 18.441719 19.14875 18.636719 19.34375 L 24.292969 25 L 18.636719 30.65625 C 18.441719 30.85125 18.441719 31.168281 18.636719 31.363281 C 18.831719 31.558281 19.14875 31.558281 19.34375 31.363281 L 25 25.707031 L 30.65625 31.363281 C 30.85125 31.558281 31.168281 31.558281 31.363281 31.363281 C 31.558281 31.168281 31.558281 30.85125 31.363281 30.65625 L 25.707031 25 L 31.363281 19.34375 C 31.558281 19.14875 31.558281 18.831719 31.363281 18.636719 C 31.168281 18.441719 30.85125 18.441719 30.65625 18.636719 L 25 24.292969 L 19.34375 18.636719 C 19.24625 18.539219 19.118234 18.490234 18.990234 18.490234 z"/></svg>
            </button>
        </form>
        <div class="modal-wrapper">
            <div class="modal-content">
                <h2>We're about to get started but...</h2>
                <div class="first-name-info">
                    <h1>Your first name is important</h1>
                    <div class="thank-icon">
                        <img src="{{ asset('images/thanks.png') }}" alt="icon saying thank you">
                    </div>
                </div>
            </div>
            <form id="create-user-btn" action="{{ route('create-user')}}" method="POST">
                @csrf
                {{-- display errors or success message BEGIN --}}
                @if($errors->any())
                @php
                   $errors = collect($errors->all())->unique(); 
                @endphp
                    <div class="email-errors">
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                @elseif (session('success'))
                    <div class="email-success">
                        <ul>
                            {{-- <li>{{ session('success') }}</li> --}}
                        </ul>
                    </div>
                @elseif (session('fail'))
                    <div class="email-fail">
                        <ul>
                            <li>{{ session('fail') }}</li>
                        </ul>
                    </div>
                @endif

                <div class="modal-errors">
                    <ul>
                    </ul>
                </div>
                {{-- @dump(session('magic-link-hash')) --}}
                {{-- display errors or success message END --}}
                <input type="hidden" name="create_user_token" value="impossible">
                <input type="text" name="name" id="name" value="{{ old('email') }}" placeholder="Solange">

                <button>
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 1920 1920">
                        <path d="M0 1694.235h1920V226H0v1468.235ZM112.941 376.664V338.94H1807.06v37.723L960 1111.233l-847.059-734.57ZM1807.06 526.198v950.513l-351.134-438.89-88.32 70.475 378.353 472.998H174.042l378.353-472.998-88.32-70.475-351.134 438.89V526.198L960 1260.768l847.059-734.57Z" fill-rule="evenodd"/>
                    </svg>
                    <span>send first name</span>
                </button>
            </form>
        </div>
    </dialog>
    <div class="login-user">
        <div class="email-success">
            <ul>
                <li>You are logged in. Congratulations!</li>
            </ul>
        </div>
        <a href="{{ route('in-logout') }}">Log out</a>
    </div>
    <script>
        const createUser = document.querySelector('#createUser')
        const modal = document.querySelector('[data-modal]')
        const form = document.querySelector('#create-user-btn')
        const formErrors = document.querySelector('.modal-errors')
        const ulErrors = formErrors.querySelector('ul')
        const loginUser = document.querySelector('.login-user')


        form.addEventListener("submit", function(event) {
            event.preventDefault();

            const formData = new FormData(form);

            console.log(formData)
            async function getData() {

                const request = new Request('/create-user', {
                    method: 'POST',
                    body: formData
                })

                try {
                    const response = await fetch(request)
                    const data = await response.json()

                    console.log("text data", data)

                    
                    if(response.ok) {
                        modal.close()
                        loginUser.style.display = "flex"
                    } else {
                        console.log("Server Error: ", data.error)
                        const errors = data.error
                        let errorMessages = ""
                        for (let field in errors) {
                            errorMessages += '<li>' + errors[field] .join('</li><li>') + '</li>';
                        }

                        ulErrors.innerHTML = errorMessages
                    }
                }
                catch(error) {
                    console.log("Fetch failure", error)
                }
            }

            getData()
        })

        if(createUser.value == "") {
            modal.showModal()
        }

        modal.addEventListener('keydown', function(event) {
            if(event.key == "Escape") {
                event.preventDefault()
            }
        })

    </script>
</body>
</html>