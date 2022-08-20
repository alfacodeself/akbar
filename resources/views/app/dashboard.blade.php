@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                    <div class="fs-5">
                        <ion-icon name="person-add-outline"></ion-icon>
                    </div>
                    <div>
                        <p class="mb-0">Followers</p>
                    </div>
                    <div class="fs-5 ms-auto">
                        <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <div>
                        <h5 class="mb-0">1,037</h5>
                    </div>
                    <div class="ms-auto" id="chart1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                    <div class="fs-5">
                        <ion-icon name="heart-outline"></ion-icon>
                    </div>
                    <div>
                        <p class="mb-0">Likes</p>
                    </div>
                    <div class="fs-5 ms-auto">
                        <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <div>
                        <h5 class="mb-0">23,758</h5>
                    </div>
                    <div class="ms-auto" id="chart2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-8 col-xl-8 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0">Statistics</h6>
                    <div class="ms-auto">
                        <div class="d-flex align-items-center font-13 gap-2">
                            <span class="border px-1 rounded cursor-pointer"><i
                                    class="bx bxs-circle me-1 text-primary"></i>Downloads</span>
                            <span class="border px-1 rounded cursor-pointer"><i
                                    class="bx bxs-circle me-1 text-primary opacity-50"></i>Earnings</span>
                        </div>
                    </div>
                </div>
                <div class="chart-container1">
                    <canvas id="chart5"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-xl-4 d-flex">
        <div class="card radius-10 overflow-hidden w-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0">Top Categories</h6>
                    <div class="dropdown options ms-auto">
                        <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                            <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="chart-container6">
                    <div class="piechart-legend">
                        <h2 class="mb-1">$85K</h2>
                        <h6 class="mb-0">Total Sales</h6>
                    </div>
                    <canvas id="chart6"></canvas>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li
                    class="list-group-item d-flex justify-content-between align-items-center border-top">
                    Clothing
                    <span class="badge bg-primary rounded-pill">55</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Electronics
                    <span class="badge bg-primary rounded-pill opacity-50">20</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Furniture
                    <span class="badge bg-primary opacity-25 rounded-pill">10</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-12 col-xl-6 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0">Customers</h6>
                    <div class="dropdown options ms-auto">
                        <div class="dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown">
                            <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-3 align-items-center">
                    <div class="col-lg-7 col-xl-7 col-xxl-7">
                        <div class="chart-container5">
                            <div class="piechart-legend">
                                <h2 class="mb-1">48K</h2>
                                <h6 class="mb-0">Customers</h6>
                            </div>
                            <canvas id="chart7"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-5 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start gap-2 mb-3">
                                <div>
                                    <ion-icon name="ellipse-sharp" class="text-primary opacity-100">
                                    </ion-icon>
                                </div>
                                <div>
                                    <p class="mb-1">Current Customers</p>
                                    <p class="mb-0 h5">66%</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2 mb-3">
                                <div>
                                    <ion-icon name="ellipse-sharp" class="text-primary opacity-75">
                                    </ion-icon>
                                </div>
                                <div>
                                    <p class="mb-1">New Customers</p>
                                    <p class="mb-0 h5">48%</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-2">
                                <div>
                                    <ion-icon name="ellipse-sharp" class="text-primary opacity-25">
                                    </ion-icon>
                                </div>
                                <div>
                                    <p class="mb-1">Retargeted Customers</p>
                                    <p class="mb-0 h5">25%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 col-xl-6 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0">Sales By Country</h6>
                    <div class="dropdown options ms-auto">
                        <div class="dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown">
                            <ion-icon name="ellipsis-horizontal-sharp" role="img"
                                class="md hydrated" aria-label="ellipsis horizontal sharp"></ion-icon>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="country-icon">
                                        <img src="assets/images/icons/india.png" alt=""
                                            width="32">
                                    </div>
                                </td>
                                <td>
                                    <div class="country-name h6 mb-0">India</div>
                                </td>
                                <td class="w-100">
                                    <div class="progress flex-grow-1" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: 82%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="percent-data">82%</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="country-icon">
                                        <img src="assets/images/icons/usa.png" alt=""
                                            width="32">
                                    </div>
                                </td>
                                <td>
                                    <div class="country-name h6 mb-0">USA</div>
                                </td>
                                <td class="w-100">
                                    <div class="progress flex-grow-1" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: 70%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="percent-data">70%</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="country-icon">
                                        <img src="assets/images/icons/china.png" alt=""
                                            width="32">
                                    </div>
                                </td>
                                <td>
                                    <div class="country-name h6 mb-0">China</div>
                                </td>
                                <td class="w-100">
                                    <div class="progress flex-grow-1" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: 60%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="percent-data">60%</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="country-icon">
                                        <img src="assets/images/icons/russia.png" alt=""
                                            width="32">
                                    </div>
                                </td>
                                <td>
                                    <div class="country-name h6 mb-0">Russia</div>
                                </td>
                                <td class="w-100">
                                    <div class="progress flex-grow-1" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: 45%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="percent-data">45%</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="country-icon">
                                        <img src="assets/images/icons/russia.png" alt=""
                                            width="32">
                                    </div>
                                </td>
                                <td>
                                    <div class="country-name h6 mb-0">Russia</div>
                                </td>
                                <td class="w-100">
                                    <div class="progress flex-grow-1" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: 30%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="percent-data">30%</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-12 col-xl-4 d-flex">
        <div class="card radius-10 bg-transparent shadow-none w-100">
            <div class="card-body p-0">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="widget-icon radius-10 bg-primary text-white">
                                <ion-icon name="wallet-sharp" role="img" class="md hydrated"
                                    aria-label="wallet sharp">
                                </ion-icon>
                            </div>
                            <div class="fs-5 ms-auto">
                                <ion-icon name="ellipsis-horizontal-sharp" role="img"
                                    class="md hydrated" aria-label="ellipsis horizontal sharp">
                                </ion-icon>
                            </div>
                        </div>
                        <h4 class="my-3">$4,580</h4>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: 65%"></div>
                        </div>
                        <p class="mb-0 mt-2">Earned This Month <span class="float-end">+2.4%</span>
                        </p>
                    </div>
                </div>
                <div class="card radius-10 mb-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="widget-icon-2 bg-primary text-white">
                                <ion-icon name="people-sharp" role="img" class="md hydrated"
                                    aria-label="people sharp">
                                </ion-icon>
                            </div>
                            <div class="fs-5 ms-auto">
                                <ion-icon name="ellipsis-horizontal-sharp" role="img"
                                    class="md hydrated" aria-label="ellipsis horizontal sharp">
                                </ion-icon>
                            </div>
                        </div>
                        <h4 class="my-3">8,126</h4>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: 65%"></div>
                        </div>
                        <p class="mb-0 mt-2">New Clients <span class="float-end">+5.3%</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 col-xl-4 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0">User Activity</h6>
                    <div class="dropdown options ms-auto">
                        <div class="dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown">
                            <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart-container3">
                    <canvas id="chart8"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 col-xl-4 d-flex">
        <div class="card radius-10 bg-transparent shadow-none w-100">
            <div class="card-body p-0">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <p class="mb-2">Total Session</p>
                                <h4 class="mb-0">15,690 <span
                                        class="ms-1 font-13 text-success">+36%</span></h4>
                            </div>
                            <div class="fs-5">
                                <ion-icon name="ellipsis-vertical-sharp"></ion-icon>
                            </div>
                        </div>
                        <div class="mt-3" id="chart9"></div>
                    </div>
                </div>
                <div class="card radius-10 mb-0">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <p class="mb-2">Page Views</p>
                                <h4 class="mb-0">28,963 <span
                                        class="ms-1 font-13 text-danger">-4.5%</span></h4>
                            </div>
                            <div class="fs-5">
                                <ion-icon name="ellipsis-vertical-sharp"></ion-icon>
                            </div>
                        </div>
                        <div class="mt-3" id="chart10"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    
<script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/index2.js') }}"></script>
@endpush