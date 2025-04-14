<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finted.it</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- CDN GOOGLEFONTS --}}
    <link rel="icon" type="image/x-icon" href="./cover/logosquare.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Matemasie&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

        {{-- CDN FONTAWESOME --}}
        <script src="https://kit.fontawesome.com/af7f2f17d3.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Swiper JS -->

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

     

</head>

<body>
    <x-nav/>
    <x-header/>
    
    @if (!request()->cookie('cookie_accepted'))
    <div id="cookie-modal" style="
        position: fixed; top: 0; left: 0; width: 100%; height: 50%;
        background: url('https://images.unsplash.com/photo-1630321212092-96fb6faba833?auto=format&fit=crop&w=1920&q=80') no-repeat center center / cover;
        display: flex; align-items: center; justify-content: center;
        z-index: 9999;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    ">
        <div style="
            background: #bc96cabe;
            #95ba61
            color: black;
            padding: 2.5rem;
            border-radius: 16px;
            max-width: 480px;
            width: 90%;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
            animation: fadeIn 0.3s ease-in-out;
        ">
            <h2 style="margin-bottom: 1rem; font-size: 1.75rem; font-weight: 600; color:rgb(246, 244, 244)">{{__('ui.CookiePreferences')}}</h2>
            <p style="margin-bottom: 2rem; font-size: 1rem; line-height: 1.5;  color:rgb(244, 241, 241)">
                {{__('ui.TextCookie')}}
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem;">
                <button onclick="acceptCookies()" style="
                    padding: 0.6rem 1.2rem;
                    background-color: #4caf4fa6;
                    color: white;
                    border: none;
                    border-radius: 8px;
                    font-size: 1rem;
                    cursor: pointer;
                    transition: background-color 0.2s;
                " onmouseover="this.style.backgroundColor='#45A049'" onmouseout="this.style.backgroundColor='#4CAF50'">{{__('ui.Accept')}}</button>
                
                <button onclick="declineCookies()" style="
                    padding: 0.4rem 1rem;
                    background-color: #f443369a;
                    color: white;
                    border: none;
                    border-radius: 8px;
                    font-size: 1rem;
                    cursor: pointer;
                    transition: background-color 0.2s;
                " onmouseover="this.style.backgroundColor='#d7372e'" onmouseout="this.style.backgroundColor='#f44336'">{{__('ui.Decline')}}</button>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
@endif

<script>
    function acceptCookies() {
        fetch('/accetta-cookie')
            .then(() => {
                document.getElementById('cookie-modal').style.display = 'none';
            });
    }

    function declineCookies() {
        fetch('/rifiuta-cookie')
            .then(() => {
                document.getElementById('cookie-modal').style.display = 'none';
            });
    }
</script>

    <div class="min-vh-100 p-0">
        {{ $slot }}     
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
<x-footer/>
</html>
