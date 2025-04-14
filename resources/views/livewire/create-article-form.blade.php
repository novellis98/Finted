<div>
    <div class="container-md my-5 ">
        <div class="row justify-content-center ">
            <div>
                <div class="container-md my-5 ">
                    <div class="row justify-content-center  ">
                        <div
                            class="col-12 col-md-8 border rounded p-5 shadow back @if ($errors->any()) wobble-hor-bottom @endif">
                            <form wire:submit="save">
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
                                        <input type="number" class="form-control shadow-none  @error('price') is-invalid @enderror"
                                            wire:model.blur="price" id="price" placeholder="{{__('ui.Prezzo')}}" min="0">
                                        @error('price')
                                            <p class="fst-italic text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <select wire:model.blur="category" id="category" 
                                            class="shadow-none form-select @error('category') is-invalid @enderror">
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
                                    <div class="col-12 col-md-6 my-3">
                                        
                                        <input type="file" wire:model.live="temporary_images" multiple
                                            class="form-control  @error('temporary_images') is-invalid @enderror"
                                            placeholder="Image">
                                            <p class="mt-2 text-muted" id="file-name-display"></p>

                                        <script>
                                            document.getElementById('uploadInput').addEventListener('change', function(e) {
                                                const files = Array.from(e.target.files).map(f => f.name).join(', ');
                                                document.getElementById('file-name-display').textContent = files || 'No files selected';
                                            });
                                        </script>
                                        @error('temporary_images.*')
                                            <p class="fst-italic text-danger">{{ $message }}</p>
                                        @enderror
                                        @error('temporary_images')
                                            <p class="fst-italic text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @if (!empty($images))
                                        <div class="row">
                                            <div class="col-12">
                                                <p>{{__('ui.ImagesReview')}}</p>
                                                <div class="row border  border-success rounded  py-4">
                                                    @foreach ($images as $key => $image)
                                                        <div class="col d-flex flex-column align-items-center my-3">
                                                            <div class="img-preview mx-auto shadow rounded"
                                                                style="background-image: url('{{ $image->temporaryUrl() }}')">
                                                            </div>
                                                            <button type="button" class="btn mt-1 btn-danger py-0 px-2"
                                                                wire:click="removeImage({{ $key }})">X</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-custom">
                                    {{__('ui.CreatePost')}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
