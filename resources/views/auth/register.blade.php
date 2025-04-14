<x-layout>

    <h1 class="text-center mt-2 display-2 ">{{ __('ui.Register') }}</h1>
    <div class="container my-3 border rounded p-5 shadow w-100 w-lg-50 back  @if ($errors->any()) wobble-hor-bottom @endif">
        <div class="row ">
            <div class="col-12">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="Username" class="form-label  @error('title') is-invalid @enderror">{{ __('ui.UserName') }}</label>
                        <input type="text" class="form-control" name="name" id="Username">
                        @error('name')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Inputemail" class="form-label">{{ __('ui.EmailAddress') }}</label>
                        <input type="email" class="form-control" name="email" id="Inputemail">
                        @error('email')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Password" name="password">
                        @error('password')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="passwordConferma" class="form-label">{{ __('ui.ConfirmPassword') }}</label>
                        <input type="password" class="form-control" id="passwordConferma" name="password_confirmation">
                        @error('password')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-custom">{{ __('ui.Register') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
