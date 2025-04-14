<x-layout>
    <h1 class="display-4 text-center col-12 my-3 pt-2">{{__('ui.Details')}}</h1>
    <div class="container show1 shadow mb-5 rounded  w-md-75 back" >
      <div class="row justify-content-between align-items-start ">
          <!-- Colonna Swiper -->
          <div class="col-12 col-lg-7 mb-1 ps-3 pt-3" data-aos="fade-up" data-aos-duration="2000">
              <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                  class="mySwiper" thumbs-swiper=".mySwiper2" space-between="10" navigation="true">
                  @foreach ($article->images as $key => $image)
                      <swiper-slide>
                          <img class="img-fluid rounded" src="{{ $image->getUrl(500, 500) }}"
                              alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                      </swiper-slide>
                  @endforeach
              </swiper-container>
  
              <swiper-container class="mySwiper2 mt-1" space-between="10" slides-per-view="4" free-mode="true"
                  watch-slides-progress="true">
                  @foreach ($article->images as $key => $image)
                      <swiper-slide>
                          <img class="img-fluid rounded" src="{{ $image->getUrl(500, 500) }}"
                              alt="Miniatura {{ $key + 1 }}">
                      </swiper-slide>
                  @endforeach
              </swiper-container>
          </div>
  
          <!-- Colonna Dettagli -->
          <div class="col-12 col-lg-4 p-4 ms-1 align-content-center">
              <h5>{{ $article->title }}</h5>
              <p><strong>{{ __('ui.Category') }}:</strong> {{ __('ui.' . $article->category->name) }}</p>
              <p><strong>{{ __('ui.Prezzo') }}:</strong> {{ number_format($article->price, 2) }} €</p>
              <p><strong>{{ __('ui.Description') }}:</strong> {{ $article->description }}</p>
  
              <div class="d-flex flex-wrap align-items-center mt-3">
                @if (Auth::user()->is_revisor)
                <a href="{{ route('article.edit', $article->id) }}"
                  class="btn btn-custom m-2 btn-outline-success">
                  <i class="bi bi-pencil" title="Edit"></i>
              </a>
    
@endif
                 
                  {{-- <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-custom m-2 btn-outline-danger">
                          <i class="bi bi-trash" title="Delete"></i>
                      </button>
                  </form> --}}
                  @auth
                  @if (Auth::user()->is_revisor)
                  <form action="{{ route('article.destroy', $article->id) }}" method="POST" id="delete-form-{{ $article->id }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-custom m-2 btn-outline-danger" onclick="confirmDelete({{ $article->id }})">
                          <i class="bi bi-trash" title="Delete"></i>
                      </button>
                  </form>
              @endif
              @endauth
              
                  <a href="{{ route('articles') }}">
                      <button type="button" class="btn btn-custom m-2">
                          <i class="bi bi-arrow-left" title="Back"></i>
                      </button>
                  </a>
              </div>
          </div>
      </div>
  </div>
  
  <script>
    function confirmDelete(articleId) {
        if (confirm('{{ __('ui.AreYouSureToDeleteThisArticle') }}')) {
            document.getElementById('delete-form-' + articleId).submit();
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

    <!-- <div class="container text-center">
  <div class="row row-cols-2">
    <div class="col">
        <img src="/cover/logo2.png" class="card-img-top" alt="...">
    </div>
    <div class="col">
        <img src="/cover/logo2.png" class="card-img-top" alt="...">
    </div>
    <div class="col">
        <img src="/cover/logo2.png" class="card-img-top" alt="...">
    </div>
    <div class="col">
        <img src="/cover/logo2.png" class="card-img-top" alt="...">
    </div>
  </div>
</div> -->




    <!-- <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->

</x-layout>
