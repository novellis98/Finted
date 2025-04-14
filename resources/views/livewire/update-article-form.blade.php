<div>
    <div class="container-md my-5 ">
        <div class="row justify-content-center ">
            <div>
                <div class="container-md my-5 ">
                    <div class="row justify-content-center ">
                        <div
                            class="col-12 col-md-8 border rounded p-5 shadow back  @if ($errors->any()) wobble-hor-bottom @endif">
                            <form wire:submit="update">
                                <div class="mb-3">
                                    <label for="title" class="form-label">
                                        {{__('ui.Title')}}
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        wire:model.blur="title" id="title">
                                    @error('title')
                                        <p class="fst-italic text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">{{__('ui.Description')}}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                        wire:model.blur="description"></textarea>
                                    @error('description')
                                        <p class="fst-italic text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="row mt-4 mb-2">
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="number" class="form-control  @error('price') is-invalid @enderror"
                                            wire:model.blur="price" id="price" placeholder="Price" min="0">
                                        @error('price')
                                            <p class="fst-italic text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <select wire:model.blur="category" id="category"
                                            class="form-select @error('category') is-invalid @enderror">
                                            <option value="">{{__('ui.SelectCategory')}}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" class="form-control">
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <p class="fst-italic text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-custom">
                                    {{__('ui.EditPost')}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
