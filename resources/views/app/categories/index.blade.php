@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 d-none d-md-inline">Categories</h5>
                        <form class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                <ion-icon name="search-sharp"></ion-icon>
                            </div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Last Update</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-capitalize">
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->products_count ?? 0 }} Products
                                        </td>
                                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                <button
                                                    class="btn btn-outline-warning btn-sm px-0 mx-0 btn-update"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title=""
                                                    data-bs-original-title="Edit"
                                                    aria-label="Edit"
                                                    data-title="Edit Category"
                                                    data-route="{{ route('categories.update', $category->slug) }}"
                                                    data-name="{{ $category->name }}">
                                                    <i class="fadeIn animated bx bx-pencil"></i>
                                                </button>
                                                <form action="{{ route('categories.destroy', $category->slug) }}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm px-0 mx-0"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                        data-bs-original-title="Delete" aria-label="Delete">
                                                        <i class="fadeIn animated bx bx-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">There's no category!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase" id="form-update-title">Create Category</h6>
                        <hr>
                        <form class="row g-3" id="form-update-route" action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" id="form-update-name" class="form-control text-capitalize     @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="form-update-button">Create Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('.btn-update').on('click', function(){
                const title = $(this).attr('data-title');
                const name = $(this).attr('data-name');
                const route = $(this).attr('data-route');
                document.getElementById('form-update-route').insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">')
                document.getElementById('form-update-title').innerHTML = title;
                document.getElementById('form-update-button').innerHTML = title;
                document.getElementById('form-update-name').value = name;
                document.getElementById('form-update-route').action = route;
            })
        });
    </script>
@endpush
