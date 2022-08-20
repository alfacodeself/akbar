@extends('layouts.app')
@section('title', 'General Setting')
@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card radius-10">
                <div class="card-body">
                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-3">General Setting</h5>
                        <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center">
                            <div id="image-preview" class="user-change-photo shadow">
                                <img src="{{ url($setting->logo) }}" alt="Logo">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="formFile" class="form-label">Logo</label>
                                <input class="form-control @error('logo') is-invalid @enderror" type="file" id="formFile" name="logo">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <h5 class="mb-0 mt-4">Merchant Information</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Merchant Name</label>
                                <input type="text" class="form-control @error('merchant') is-invalid @enderror" placeholder="Merchant Name" name="merchant" value="{{ old('merchant', $setting->merchant) }}">
                                @error('merchant')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Owner</label>
                                <input type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" placeholder="Owner Name" value="{{ old('owner', $setting->owner) }}">
                                @error('owner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number', $setting->phone_number) }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Map</label>
                                <input type="hidden" id="latitude" name="lat" value="{{ old('lat', $setting->lat) }}">
                                <input type="hidden" id="longitude" name="lng" value="{{ old('lng', $setting->lng) }}">
                                <div id="map" style="width: 100%; height:300px"></div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="4" cols="4" placeholder="Merchant's Address...">{{ old('address', $setting->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <h5 class="mb-0 mt-4">Merchant's Social</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Facebook</label>
                                <input class="form-control @error('facebook') is-invalid @enderror" name="facebook" type="text" placeholder="Facebook" value="{{ old('facebook', $setting->facebook) }}">
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Instagram</label>
                                <input class="form-control @error('instagram') is-invalid @enderror" name="instagram" type="text" placeholder="Instagram" value="{{ old('instagram', $setting->instagram) }}">
                                @error('instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">WhatsApp</label>
                                <input class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" type="text" placeholder="WhatsApp" value="{{ old('whatsapp', $setting->whatsapp) }}">
                                @error('whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-start mt-3">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const userLat = {{ old('lat', $setting->lat) ?? '-7.756928' }};
        const userLng = {{ old('lng', $setting->lng) ?? '113.211502' }};
        // console.log(userLat, userLng);
        function initMap() {
            // Show MAP
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: userLat,
                    lng: userLng
                },
                zoom: 13,
                scrollwheel: true,
            });
            // Make marker use drag
            const uluru = {
                lat: userLat,
                lng: userLng
            };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            // // Make marker use click
            google.maps.event.addListener(map, 'click', function(event) {
                pos = event.latLng
                marker.setPosition(pos);
            })
            // Add to form
            google.maps.event.addListener(marker, 'position_changed', function() {
                let lat = marker.position.lat();
                let lng = marker.position.lng();
                $('#latitude').val(lat);
                $('#longitude').val(lng);
            });
        }
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCWY-q7-nQ4ESJpVa1Jx4ErwzDCoJ73cAo&callback=initMap&libraries=&v=weekly">
    </script>
    <script>
        const chooseFile = document.getElementById("formFile");
        const imgPreview = document.getElementById("image-preview");

        chooseFile.addEventListener("change", function() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imgPreview.className = 'user-change-photo shadow'
                    imgPreview.innerHTML = '<img src="' + this.result + '" alt="logo">'
                });
            }
        });
    </script>
@endpush
