@extends('layouts.app')
@section('title', "Product's Galleries")
@section('content')
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
        @forelse ($galleries as $gallery)
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <img src="{{ url($gallery->image) }}" class="img-fluid mb-3" alt="...">
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <div class="card radius-10">
                <div class="card-body">
                    There's no any gallery!
                </div>
            </div>
        </div>
        @endforelse
    </div>
@endsection
