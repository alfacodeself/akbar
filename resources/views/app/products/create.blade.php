@extends('layouts.app')
@section('title', 'Create Product')
@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card radius-10">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-3">Create Product</h5>
                        <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center">
                            <div id="image-preview"></div>
                            <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" name="thumbnail" id="formFile" value="{{ old('thumbnail') }}">
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <h5 class="mb-0 mt-4">Product Information</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-8">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Product Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="form-label">Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="1" value="{{ old('stock') }}">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Product Category</label>
                                <select class="form-select text-capitalize @error('category') is-invalid @enderror" name="category">
                                    <option selected value="">Choose Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->slug }}" {{ old('categori') == $category->slug ? 'selected' : '' }} class="text-capitalize">{{ $category->name }}</option>
                                    @empty
                                        <option value="" disabled selected>There's no category!</option>
                                    @endforelse
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" cols="4" placeholder="Describe product...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <h5 class="mb-0 mt-4">Product's Galleries</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Galleries</label>
                                <input class="form-control @error('galleries.*') is-invalid @enderror" name="galleries[]" type="file" id="formFileMultiple" multiple="" value="{{ old('galleries') }}">
                                @error('galleries.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 my-3" id="galleries-preview"></div>
                        <div class="text-start mt-3">
                            <button type="submit" class="btn btn-primary px-4">Create Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const chooseFile = document.getElementById("formFile");
        const imgPreview = document.getElementById("image-preview");

        chooseFile.addEventListener("change", function(){
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function(){
                    imgPreview.className = 'user-change-photo shadow'
                    imgPreview.innerHTML = '<img src="'+this.result+'" alt="logo" width="500" height="300">'
                });
            }
        });
    </script>
    <script>
        const chooseGalleries = document.getElementById("formFileMultiple");
        let galleriesPreview = document.getElementById("galleries-preview");
        chooseGalleries.onchange = function (e){
            const files = chooseGalleries.files;
            let html = '';
            console.log(files);
            files.forEach(file => {
                if (file) {
                    const fileReader = new FileReader();
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function(e) {
                        html += '<div class="shadow col-md-4">';
                        html += '<img src="'+e.target.result+'" alt="logo" class="img-thumbnail">';
                        html += '</div>';
                        galleriesPreview.innerHTML = html
                    }
                }
            });
        }
    </script>
@endpush
