<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="color-scheme" content="light dark"> --}}
    <title>Wrabbit Movie Casting</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section id="hero">
        <div class="hero-container">
            <div class="hero-header">
                <div class="hero-header-title">
                    <h1>Welcome to the exciting world of film and television</h1>
                </div>
                <div class="hero-header-body">
                    <p>Becoming a Supporting Artist, or "Extra", can provide you with an exciting and rewarding career which you can fit around your lifestyle, family or other work commitments.</p>
                    <p>Centre Stage is the industry portal to allow you access to this exciting career and you will find the information and assistance you need on our website.</p>
                </div>
                <div class="hero-header-footer">
                    <button data-open-modal>Register / Login</button>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{asset('images/casting2.png')}}" alt="collage of directors and actors onset">
            </div>
        </div>
        <div id="redirect-container" data-login-url="{{ route('login') }}"></div>
        <dialog data-modal class="hero-modal">
            <small class="hero-input-message-on hero-input-message">We need your email for Casting Access</small>
            <form action="{{ route('send-email') }}" method="POST" class="hero-modal-form">
                @csrf
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Enter your email">
                <div class="hero-form-input-info">
                    <span class="hero-form-input-info-container" id="pulse"></span>
                    <span class="hero-form-input-info-icon shake" id="shake">?</span>
                </div>
                <button class="hero-form-submit-btn" type="submit">Submit</button>
            </form>
        </dialog>
    </section>
</body>
</html>