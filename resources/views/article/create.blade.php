<x-layout>
    {{-- <div>
        @if (session('message'))
            <div class="alert alert-danger" id="messagePassword">
                {{ session('message') }}
            </div>
        @endif
    </div> --}}

    <h1 class="mt-5 text-center">{{__('ui.AddArticle')}}</h1>

    <livewire:create-article-form />

</x-layout>
