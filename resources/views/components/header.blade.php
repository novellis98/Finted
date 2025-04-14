<div class="row jusify-content-center  ">
    <div class="col-10 col-md-4 m-auto ">
    @if (session('message'))
        <div class="alert alert-custom text-center shadow" id="messagePassword">
            {{ session('message') }}
        </div>
    </div>
    @endif
</div>
