<x-layout>

    <h1 class="text-center mt-4 display-6">{{__('ui.WorkWithUs')}}</h1>
    <div class="container my-3 border rounded p-5 shadow col-12 col-md-6 back">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('joinUs.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.Name')}}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" readonly>
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">{{__('ui.Surname')}}</label>
                        <input type="text" class="form-control" name="last_name" id="Username">
                        @error('last_name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.EmailAddress')}}</label>
                        <input type="email" class="form-control" name="email" id="email"  value="{{ auth()->user()->email }}" readonly>
                        @error('email')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message_user" class="form-label">{{__('ui.CoverLetter')}}</label>
                        <textarea type="text" class="form-control" rows="5" id="message_user" name="message_user"></textarea>
                        @error('message_user')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-custom me-3">{{__('ui.SendEmail')}}</button>
                    
                    <a href="{{ route('home') }}" class="btn btn-custom">{{__('ui.BackToHome')}}</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>
