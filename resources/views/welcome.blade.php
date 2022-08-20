<!doctype html>
<html lang="en" class="semi-dark">

<head>
    {{-- <!-- Required meta tags --> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <!-- loader--> --}}
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    {{-- <!--Theme Styles--> --}}
    <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/header-colors.css"') }} rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Project Akbar Awikwok</title>
</head>

<body>
    <div class="container-fluid px-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-breadcrumb shadow py-3 px-3 d-sm-flex align-items-center">
                            <div class="breadcrumb-title pe-3">{{ $setting->merchant }}</div>
                            <div class="ms-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-primary">Pengaturan</button>
                                    <button type="button"
                                        class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                        <a class="nav-link dark-mode-icon" href="javascript:;">
                                            <div class="mode-icon">
                                                <ion-icon name="moon-sharp"></ion-icon> Mode
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="shop-page">
                            <div class="shop-container">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="toolbox d-flex flex-row align-items-center gap-2">
                                                            <div class="d-flex flex-wrap gap-1">
                                                                <div class="d-flex align-items-center flex-nowrap">
                                                                    <p class="mb-0 font-13 text-nowrap">Paginate:</p>
                                                                    <select class="form-select ms-3" id="paginate">
                                                                        <option>5</option>
                                                                        <option>10</option>
                                                                        <option>20</option>
                                                                        <option>50</option>
                                                                        <option>100</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-3">
                                                <div class="btn-mobile-filter d-xl-none"><i
                                                        class='bx bx-slider-alt'></i>
                                                </div>
                                                <div class="filter-sidebar d-none d-xl-flex">
                                                    <div class="card w-100">
                                                        <div class="card-body">
                                                            <div class="align-items-center d-flex d-xl-none">
                                                                <h6 class="text-uppercase mb-0">Filter</h6>
                                                                <div
                                                                    class="btn-mobile-filter-close btn-close ms-auto cursor-pointer">
                                                                </div>
                                                            </div>
                                                            <hr class="d-flex d-xl-none" />
                                                            <div class="product-categories">
                                                                <h6 class="text-uppercase mb-3">Categories</h6>
                                                                <ul class="list-unstyled mb-0 categories-list">
                                                                    @forelse ($categories as $category)
                                                                        <li>
                                                                            <a href="{{ route('welcome', ['category' => $category->name]) }}"
                                                                                class="text-capitalize">
                                                                                {{ $category->name }}
                                                                                <span
                                                                                    class="float-end badge rounded-pill bg-primary">{{ $category->products_count }}</span>
                                                                            </a>
                                                                        </li>
                                                                    @empty
                                                                        <li>
                                                                            <a>
                                                                                Theres's no category
                                                                            </a>
                                                                        </li>
                                                                    @endforelse
                                                                </ul>
                                                            </div>
                                                            <hr>
                                                            <div class="size-range">
                                                                <h6 class="text-uppercase mb-3">Stock</h6>
                                                                <ul class="list-unstyled mb-0 categories-list">
                                                                    <li>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input stock-by"
                                                                                type="checkbox" value="empty"
                                                                                name="stock" id="Empty"
                                                                                {{ request()->stock == 'empty' ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="Empty">Empty</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input stock-by"
                                                                                type="checkbox" value="ready"
                                                                                name="stock" id="Ready"
                                                                                {{ request()->stock == 'ready' ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="Ready">Ready</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-9">
                                                <div class="product-wrapper">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control ps-5"
                                                                    placeholder="Search Product...">
                                                                <span
                                                                    class="position-absolute top-50 product-show translate-middle-y">
                                                                    <ion-icon name="search-sharp" class="ms-3 fs-6">
                                                                    </ion-icon>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-grid">

                                                        <div class="card product-card">
                                                            @forelse ($products as $product)
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <div class="p-3">
                                                                            <img src="{{ url($product->thumbnail) }}"
                                                                                class="img-fluid" alt="...">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <div class="product-info">
                                                                                <a>
                                                                                    <p
                                                                                        class="product-catergory text-capitalize font-13 mb-1">
                                                                                        {{ $product->category->name }}
                                                                                    </p>
                                                                                </a>
                                                                                <a class="text-primary">
                                                                                    <h6 class="product-name mb-2">
                                                                                        {{ $product->name }}
                                                                                    </h6>
                                                                                </a>
                                                                                <p class="card-text">
                                                                                    {{ $product->description }}
                                                                                </p>
                                                                                <div class="product-action mt-2">
                                                                                    <div class="d-flex gap-2">
                                                                                        <a href="{{ route('product.galleries', $product->slug) }}"
                                                                                            class="btn btn-primary btn-ecomm">
                                                                                            <i class="bx bx-images"></i>
                                                                                            See Gallery
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <center>{{ $products->links() }}</center>
                                                    {{-- <nav class="d-flex justify-content-between"
                                                        aria-label="Page navigation">
                                                        <ul class="pagination">
                                                            <li class="page-item"><a class="page-link"
                                                                    href="javascript:;"><i
                                                                        class='bx bx-chevron-left'></i> Prev</a>
                                                            </li>
                                                        </ul>
                                                        <ul class="pagination">
                                                            <li class="page-item active d-none d-sm-block"
                                                                aria-current="page"><span class="page-link">1<span
                                                                        class="visually-hidden">(current)</span></span>
                                                            </li>
                                                            <li class="page-item d-none d-sm-block"><a
                                                                    class="page-link" href="javascript:;">2</a>
                                                            </li>
                                                            <li class="page-item d-none d-sm-block"><a
                                                                    class="page-link" href="javascript:;">3</a>
                                                            </li>
                                                            <li class="page-item d-none d-sm-block"><a
                                                                    class="page-link" href="javascript:;">4</a>
                                                            </li>
                                                            <li class="page-item d-none d-sm-block"><a
                                                                    class="page-link" href="javascript:;">5</a>
                                                            </li>
                                                        </ul>
                                                        <ul class="pagination">
                                                            <li class="page-item"><a class="page-link"
                                                                    href="javascript:;" aria-label="Next">Next <i
                                                                        class='bx bx-chevron-right'></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--end shop area-->

                    </div>
                    <!-- end page content-->
                </div>
                <a href="javaScript:;" class="back-to-top">
                    <ion-icon name="arrow-up-outline"></ion-icon>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        
        <div class="row">
            <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
                    <!-- Left -->
                    <div class="me-5 d-none d-md-block">
                        <span>Get connected with us on social networks:</span>
                    </div>
                    <div>
                        <a href="https://m.facebook.com/{{ $setting->facebook }}" class="text-white me-4">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/{{ $setting->instagram }}" class="text-white me-4">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/{{ $setting->whatsapp }}" class="text-white me-4">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->
    
                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold">{{ $setting->merchant }}</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px" />
                                <p>
                                    {{ $setting->address }}
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            </div>
                            <!-- Grid column -->
    
                            <!-- Grid column -->
                            <div class="col-md-5 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Contact</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px" />
                                <p><i class="fas fa-phone mr-3"></i> {{ '+' . $setting->phone_number }}</p>
                                <p><i class="fab fa-facebook-f mr-3"></i> {{ $setting->facebook }}</p>
                                <p><i class="fab fa-instagram mr-3"></i> {{ $setting->instagram }}</p>
                                <p><i class="fa-brands fa-whatsapp mr-3"></i> {{ '+' . $setting->whatsapp }}</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                    © 2020 Copyright:
                    <a class="text-white" href="">Alfa Code</a>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.stock-by').on('click', function() {
                const val = $(this).val();
                let url = '{{ route('welcome', ['stock' => '~id']) }}';
                url = url.replace('~id', val)
                window.location.replace(url)
            })
            $('#paginate').on('change', function() {
                const val = $(this).val();
                let url = '{{ route('welcome', ['paginate' => '~id']) }}';
                url = url.replace('~id', val)
                window.location.replace(url)
            })
        });
    </script>

</body>

</html>
