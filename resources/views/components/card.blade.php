{{-- <div class="card m-4 col-4 col-md-2 shadow1 " style="width: 18rem;" data-aos="fade-up" data-aos-duration="2000">
    <img src="/cover/logo2.png" class="card-img-top pt-2 " alt="...">
    <div class="card-body">

        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->category->name }}</p>
        <p class="card-text"> {{ $article->price }} €</p>
        <a href="{{ route('article.show', $article->id) }}" class="btn btn-custom">Dettagli</a>
    </div>
</div> --}}


<div class="card m-2 shadow1" data-aos="fade-up" data-aos-duration="2000">
    <div class="card-image">
       
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(500, 500) : asset('cover/logo2.png') }}"
            alt="immagine articolo {{ $article->title }}">
    </div>
    <div class="card-body">
        <h2 class="card-title">{{ $article->title }}</h2>
        <p class="card-category">{{__('ui.Category')}}:  {{ __('ui.' . $article->category->name) }}</p>
        <p class="card-price">{{__("ui.Prezzo")}}: {{ $article->price }} &euro;</p>
        <a href="{{ route('article.show', $article->id) }}" class="btn btn-custom">{{__('ui.Details')}}</a>
    </div>
</div>
