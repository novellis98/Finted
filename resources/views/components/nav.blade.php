<nav class="navbar navbar-expand-lg  border-body  sticky-top py-0 ">
    <div class="container-fluid py-0">
        <a class="navbar-brand align-self-center" href="{{ route('home') }}"><img src="/cover/logocompleto.png"
                id="logo" alt="logo"></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-0">
                <li class="nav-item ">
                    <a class="nav-link fs-5" aria-current="page" href="{{ route('home') }}">Home <span
                            class="text-secondary d-none d-lg-inline">|</span></a>
                </li>


                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item py-0"><a href="{{ route('revisor.index') }}"
                                class="nav-link fs-5 position-relative w-sm-25">
                                {{__('ui.ReviewerZone')}} 
                                <span
                                    class="position-absolute translate-middle badge rounded-pill bg-danger"  >{{ \App\Models\Article::toBeRevisedCount() }}</span>
                                    <span
                            class="text-secondary d-none d-lg-inline">|</span>
                            </a>
                        </li>
                    @endif
                @endauth






                <li class="nav-item ">
                    <a class="nav-link fs-5" aria-current="page" href="{{ route('articles') }}">{{__('ui.Articles')}} <span
                            class="text-secondary d-none d-lg-inline">|</span> </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('login') }} ">{{__('ui.Login')}}<span
                            class="text-secondary d-none d-lg-inline"> |</span> </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link fs-5" href="{{ route('register') }}">{{__('ui.Register')}} <span
                            class="text-secondary d-none d-lg-inline">|</span></a>
                    </li>
                @else
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__('ui.Hello')}}, <span class="text-uppercase fs-5 text-white ">{{ Auth::user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu">
                          {{-- <li><a class="dropdown-item" href="#">{{__('ui.EditArticle')}}</a></li>
                          <li><a class="dropdown-item" href="#">{{__('ui.Articles')}}</a></li> --}}
                      
                          @if (!Auth::user()->is_revisor)
                              <li>
                                  <a class="dropdown-item" href="{{ route('joinUs.create') }}">{{__('ui.WorkWithUs')}}</a>
                              </li>
                          @endif
                      
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li>
                              <div class="text-center">
                                  <form action="{{ route('logout') }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-custom py-1 text-center">{{__('ui.Logout')}}</button>
                                  </form>
                              </div>
                          </li>
                      </ul>

                    </li>
                   
                    <li class="nav-item align-self-center ms-4 py-0">
                        <a class="p-0" href="{{ route('article.create') }}">
                            <button class="wt-btn_sign mb-1  "><span class="wt-btn_sign-bound  "><span class=" " data-width="#fff"
                                        data-text="{{__('ui.SellNow')}}">{{__('ui.SellNow')}}</span></span></button>
                        </a>
                    </li>
                @endguest
            </ul>
            <div class="dropdown ">
              <button class="btn py-0 dropdown-toggle" type="button" id="localeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('vendor/blade-flags/language-' . app()->getLocale() . '.svg') }}" width="25px" height="25px" alt="Current language">
              </button>
              <ul class="dropdown-menu custom-dropdown-width" aria-labelledby="localeDropdown">
                  @foreach(['it', 'en', 'es'] as $lang)
                      @if ($lang !== app()->getLocale())
                          <li>
                              <form action="{{ route('setLocale', $lang) }}" method="POST" class="d-inline " >
                                  @csrf
                                  <button type="submit" class="dropdown-item d-flex  align-items-center py-0" style="width: 10px;">
                                      <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="20px" height="20px" class="me-1">
                                      {{ strtoupper($lang) }}
                                  </button>
                              </form>
                          </li>
                      @endif
                  @endforeach
              </ul>
          </div>
            <form class="d-flex" role="search" method="GET" action="{{ route('article.search') }}">
                <input class="form-control me-2 shadow-none" type="search" placeholder="{{__('ui.Search')}}" aria-label="Search" name="query">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
           
       

            
        </div>
    </div>
</nav>
