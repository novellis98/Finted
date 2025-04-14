<form action="{{route('setLocale' , $lang)}}" method="POST" class="d-inline">
    @csrf 
    <button type="submit" class="btn px-1 rounded">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="25px" height="25px" alt="Language buttons" >
    </button>
</form>