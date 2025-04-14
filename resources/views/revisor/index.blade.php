<x-layout>

    <h1 class="display-5 text-center col-12 my-3 ">{{ __('ui.ReviewerZone') }}</h1>
    <div class="container border rounded shadow my-5 px-3 back">
        <div class="row justify-content-between">
            @if ($article_to_check)
                <!-- Colonna 1: Swiper -->
                <div class="col-10 col-lg-5 py-4 mx-auto">
                    <!-- Swiper principale -->
                    <swiper-container
                        style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="mySwiper"
                        thumbs-swiper=".mySwiper2"
                        space-between="10"
                        navigation="true">
                        @foreach ($article_to_check->images as $key => $image)
                            <swiper-slide>
                                <img src="{{ $image->getUrl(500, 500) }}"
                                     alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
    
                    <!-- Thumbnails -->
                    <swiper-container
                        class="mySwiper2 mt-3"
                        space-between="10"
                        slides-per-view="4"
                        free-mode="true"
                        watch-slides-progress="true">
                        @foreach ($article_to_check->images as $key => $image)
                            <swiper-slide>
                                <img class="img-fluid" src="{{ $image->getUrl(500, 500) }}"
                                     alt="Miniatura {{ $key + 1 }}">
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                </div>
    
                <!-- Colonna 2: Info -->
                <div class="col-12 col-lg-5 py-4 ps-4">
                    <!-- Riga 1: Dettagli e Ratings -->
                    <div class="row">
                        <!-- Dettagli -->
                        <div class="col-12 col-md-6 mb-4">
                            <h2>{{ $article_to_check->title }}</h2>
                            <h4>{{ __('ui.Autore') }}: {{ $article_to_check->user->name }}</h4>
                            @if (isset($article_to_check->price))
                                <h5>{{ __('ui.Prezzo') }}: {{ $article_to_check->price }}€</h5>
                            @endif
                            <h5>{{ __('ui.Category') }}: {{ __('ui.' . $article_to_check->category->name) }}</h5>
                            <p class="h6">{{ __('ui.Description') }}: {{ $article_to_check->description }}</p>
                        </div>
    
                        <!-- Ratings -->
                        <div class="col-12 col-md-6 mb-4">
                            <h5>{{ __('ui.Ratings') }}</h5>
                            @php $firstImage = $article_to_check->images->first(); @endphp
                            @if ($firstImage)
                                @foreach (['adult', 'violence', 'spoof', 'racy', 'medical'] as $rating)
                                    <div class="row align-items-center mb-2">
                                        <div class="col-2 text-center">
                                            <div class="{{ $firstImage->$rating }}"></div>
                                        </div>
                                        <div class="col-10 text-capitalize">{{ $rating }}</div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
    
                    <!-- Riga 2: Labels e Pulsanti -->
                    <div class="row align-items-start">
                        <!-- Labels -->
                        <div class="col-12 col-md-6 mb-3">
                            <h5>{{ __('ui.Labels') }}</h5>
                            @if ($article_to_check->images->isNotEmpty() && $article_to_check->images->first() && $article_to_check->images->first()->labels)
                            @foreach ($article_to_check->images->first()->labels as $label)
                                <span class="fs-6 text-black me-1">#{{ $label }}</span>
                            @endforeach
                        @else
                            <p class="fst-italic">
                                @if(!$article_to_check->images->isNotEmpty())
                                {{ __('ui.NoImages') }}
                                @elseif (!$article_to_check->images->first() || !$article_to_check->images->first()->labels)
                                {{ __('ui.NoLabels') }}
                                @endif
                            </p>
                        @endif
                        </div>
    
                        <!-- Pulsanti -->
                        <div class="col-12 col-md-6">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-outline-danger m-2 fw-bold">{{ __('ui.Reject') }}</button>
                            </form>
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-outline-success m-2 fw-bold">{{ __('ui.Accept') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center align-items-center text-center ">
                    <div class="col-6">
                        <h3 class="fst-italic  my-5">{{ __('ui.NoArticlesToReview') }}</h3>
                        <a href="{{ route('home') }}" class="btn btn-custom my-4">{{ __('ui.ReturnToHome') }}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

</x-layout>
