<x-layout>
<h1 class="text-center my-3">Marketplace</h1>
    {{-- <nav class="navbar bg-body-tertiary navCategory p-1">
        <form class="container-fluid justify-content-center align-items-center">
            <a class="btn btn-category me-2 mt-1 fs-5 text-white" data-aos="fade-down" data-aos-duration="2000"
                href="{{ route('articles') }}">{{__('ui.allArticles')}}</a>
            @foreach ($categories as $category)
                <a class="btn btn-category me-2 mt-1 fs-5 text-white" data-aos="fade-down" data-aos-duration="2000"
                    href="{{ route('articles', ['category' => $category->id]) }}">{{__("ui.$category->name")}}</a>
            @endforeach
        </form>
    </nav> --}}
    <button class="custom-navbar__toggle shadow" id="navbarToggle">
        <i id="toggleIcon" class="bi bi-arrow-bar-right px-0 "> {{ __("ui.Category") }}</i>
    </button>
    
    
    <!-- Sidebar nascosta -->
    <nav class="custom-navbar shadow" id="customNavbar">
        <ul class="custom-navbar__menu">
            <li class="custom-navbar__item">
                <a href="{{ route('articles') }}" class="custom-navbar__link hover-underline">
                    <i data-feather="home"></i>
                    <span>{{ __('ui.allArticles') }}</span>
                </a>
            </li>
            @foreach ($categories as $category)
                <li class="custom-navbar__item">
                    <a href="{{ route('articles', ['category' => $category->id]) }}" class="custom-navbar__link hover-underline">
                        <i data-feather="folder"></i>
                        <span>{{ __("ui.$category->name") }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    
    <div class="container d-flex justify-content-center align-items-center mt-2">
        <div class="row  justify-content-center">
            @if ($articles->isEmpty())
                <h4>{{__('ui.NoArticlesFound')}}</h4>
            @else
            <div class="container row justify-content-center align-items-center my-5 g-0 m-auto">
                @foreach ($articles as $article)
                <x-card :article="$article" />
        
        
        
             
                @endforeach
            
          
            </div>
            @endif
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('navbarToggle');
            const navbar = document.getElementById('customNavbar');
            const toggleIcon = document.getElementById('toggleIcon');
    
            toggleBtn.addEventListener('click', () => {
                navbar.classList.toggle('custom-navbar--active');
    
                // Cambia l’icona usando una logica ternaria
                toggleIcon.className = navbar.classList.contains('custom-navbar--active') 
                    ? 'bi bi-arrow-bar-left' 
                    : 'bi bi-arrow-bar-right';
            });
    
            feather.replace();
        });
    </script>
    
    
</x-layout>
