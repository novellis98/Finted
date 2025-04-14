<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
    @endif


    <h1 class="text-center mt-2 display-3 heartbeat">Finted</h1>
    
<header data-aos="fade-right"
data-aos-offset="500"
data-aos-easing="ease-in-sine"
data-aos-duration="1500">
<div class="banner shadow ">
  <div class="banner-text">
    <h1>{{__('ui.SellWithUs')}}</h1>
    <p>{{__('ui.GiveNewLife')}}</p>
    <a class="btn btn-custom" href="{{ route('article.create') }}">{{__('ui.SellNow')}}</a>
  </div>
  
</div>
</header>
<h2 class="text-center my-5">{{ __('ui.LatestItems') }} :</h2>
    <div class="container-fluid row justify-content-center align-items-center my-2 g-0 mx-0">

        @foreach ($articles as $article)
            <div class="card m-2 " data-aos="fade-up" data-aos-duration="2000">
                <div class="card-image">
                    {{-- <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(600, 450) : asset('cover/logo2.png') }}"
                        alt="immagine articolo {{ $article->title }}">  --}}
                         <div class="custom-card-image p-3">
              <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(500, 500) : asset('cover/logo2.png') }}"
                   alt="immagine articolo {{ $article->title }}"
                   class="img-fluid rounded"
                   style="max-height: 300px; object-fit: contain;">
            </div>
  
                </div>
                <div class="card-body">
                    <h2 class="card-title"> {{ $article->title }}</h2>
                    <p class="card-category">{{ __('ui.Category') }}: {{ __('ui.' . $article->category->name) }}</p>
                    <p class="card-price">{{ __('ui.Prezzo') }}:{{ $article->price }} &euro;</p>
                    <a href="{{ route('article.show', $article->id) }}"
                        class="btn btn-custom">{{ __('ui.Details') }}</a>
                </div>
            </div>
        @endforeach 
  
   
</x-layout>
