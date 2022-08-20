@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('products.create') }}" class="btn btn-link btn-sm px-0 mx-0"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                            data-bs-original-title="Create Product" aria-label="Create Product">
                            <i class="fadeIn animated bx bx-plus-circle"></i>
                        </a>
                        <h5 class="mb-0 d-none d-md-inline">Products</h5>
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
                                    <th>Thumb</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Stock</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ url($product->thumbnail) }}" class="product-img-2" alt="product img">
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            <span class="badge bg-light-info text-primary py-2 w-100">
                                                {{ $product->category->name }}
                                            </span>
                                        </td>
                                        <td>{{ Str::limit($product->description, 70, '...') }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-outline-warning btn-sm px-0 mx-0"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit" aria-label="Edit">
                                                    <i class="fadeIn animated bx bx-pencil"></i>
                                                </a>
                                                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-info btn-sm px-0 mx-0"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Gallery Product" aria-label="Gallery Product">
                                                    <i class="fadeIn animated bx bx-images"></i>
                                                </a>
                                                <form action="{{ route('products.destroy', $product->slug) }}" class="d-inline" method="POST">
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
                                        <td colspan="6" class="text-center">There's no product!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
