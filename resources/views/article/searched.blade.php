<x-layout>
    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12">
                <h2 class="display-6">{{__('ui.SearchResults')}} "<span class="fst-italic">{{ $query }}</span>"</h2>
            </div>
        </div>
        <div class="container row justify-content-center align-items-center my-5 g-0 m-auto">
            @forelse ($articles as $article)
                <x-card :article="$article" />
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        {{__('ui.NoArticlesFound')}}
                    </h3>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>

    
</x-layout>
