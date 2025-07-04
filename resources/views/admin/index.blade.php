@extends('layouts.admin')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Welcome Admin</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Sales</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>0.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">
                                        Revenue
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>₦{{ number_format($revenue, 2) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Users
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        @if ($users)
                                            <div class="ps-3">
                                                <h6>{{ $users }}</h6>
                                            </div>
                                        @else
                                            <div class="ps-3">
                                                <h6>0</h6>
                                            </div>
                                        @endif
                                        {{-- <div class="ps-3">
                                            <h6>0</h6>
                                        </div> --}}
                                        {{-- <div class="ps-3">
                                            <h6>0</h6>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Customers Card -->

                        <!-- Account balance Card -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Textverify Account
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        @if ($account_balance1)
                                            <div>
                                                <div class="ps-3">
                                                    <h6>${{ number_format($account_balance1, 2) }}</h6>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>₦{{ number_format($account_balance2, 2) }}</h6>
                                                </div>
                                            </div>
                                        @else
                                            <div>
                                                <div class="ps-3">
                                                    <h6>$0.00</h6>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>₦0.00</h6>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- <div class="ps-3">
                                            <h6>0</h6>
                                        </div> --}}
                                        {{-- <div class="ps-3">
                                            <h6>0</h6>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Account balance Card -->

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">
                                {{-- <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div> --}}

                                <div class="card-body">
                                    <h5 class="card-title">Reports</h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(
                                                document.querySelector("#reportsChart"), {
                                                    series: [{
                                                            name: "Sales",
                                                            data: [31, 40, 28, 51, 42, 82, 56],
                                                        },
                                                        {
                                                            name: "Revenue",
                                                            data: [11, 32, 45, 32, 34, 52, 41],
                                                        },
                                                        {
                                                            name: "Users",
                                                            data: [15, 11, 32, 18, 9, 24, 11],
                                                        },
                                                    ],
                                                    chart: {
                                                        height: 350,
                                                        type: "area",
                                                        toolbar: {
                                                            show: true,
                                                        },
                                                    },
                                                    markers: {
                                                        size: 4,
                                                    },
                                                    colors: ["#4154f1", "#2eca6a", "#ff771d"],
                                                    fill: {
                                                        type: "gradient",
                                                        gradient: {
                                                            shadeIntensity: 1,
                                                            opacityFrom: 0.3,
                                                            opacityTo: 0.4,
                                                            stops: [0, 90, 100],
                                                        },
                                                    },
                                                    dataLabels: {
                                                        enabled: false,
                                                    },
                                                    stroke: {
                                                        curve: "smooth",
                                                        width: 3,
                                                    },
                                                    xaxis: {
                                                        type: "datetime",
                                                        categories: [
                                                            "2018-09-19T00:00:00.000Z",
                                                            "2018-09-19T01:30:00.000Z",
                                                            "2018-09-19T02:30:00.000Z",
                                                            "2018-09-19T03:30:00.000Z",
                                                            "2018-09-19T04:30:00.000Z",
                                                            "2018-09-19T05:30:00.000Z",
                                                            "2018-09-19T06:30:00.000Z",
                                                        ],
                                                    },
                                                    tooltip: {
                                                        x: {
                                                            format: "dd/MM/yy HH:mm",
                                                        },
                                                    },
                                                }
                                            ).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->
                                </div>
                            </div>
                        </div>
                        <!-- End Reports -->

                        <!-- Recent transactions -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title">
                                            Recent Transactions
                                        </h5>

                                        <a href="#" class="btn btn-primary">View All</a>
                                    </div>

                                    <table class="table table-border datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/N</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                $id = 1;
                                            @endphp
                                            @foreach ($transcations as $transcation)
                                                <tr>
                                                    <th scope="row">{{ $id }}</th>
                                                    <td>{{ $transcation->user->name }}</td>
                                                    <td>₦{{ number_format($transcation->amount, 2) }}</td>
                                                    <td>{{ $transcation->type }}</td>
                                                    <td>
                                                        @if ($transcation->status === 'success')
                                                            <span class="badge bg-success">Approved</span>
                                                        @elseif ($transcation->status === 'failed')
                                                            <span class="badge bg-danger">Failed</span>
                                                        @else
                                                            <span class="badge bg-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="w-100 d-flex align-items-center justify-content-start">
                                                            <form action="" method="POST" class="mx-4">
                                                                @csrf
                                                                <button type="button" class="btn btn-primary"><i
                                                                        class="bi bi-eye-fill"></i></button>
                                                            </form>
                                                            <form action="" method="POST">
                                                                @csrf
                                                                <button type="button" class="btn btn-danger"><i
                                                                        class="bi bi-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php
                                                    $id++;
                                                @endphp
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Recent transactions -->

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title">
                                            Recent Sales
                                        </h5>

                                        <a href="#" class="btn btn-primary">View All</a>
                                    </div>

                                    <table class="table table-border datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#">#2457</a></th>
                                                <td>Brandon Jacob</td>
                                                <td>
                                                    <a href="#" class="text-primary">At praesentium
                                                        minu</a>
                                                </td>
                                                <td>$64</td>
                                                <td>
                                                    <span class="badge bg-success">Approved</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2147</a></th>
                                                <td>Bridie Kessler</td>
                                                <td>
                                                    <a href="#" class="text-primary">Blanditiis dolor omnis
                                                        similique</a>
                                                </td>
                                                <td>$47</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2049</a></th>
                                                <td>Ashleigh Langosh</td>
                                                <td>
                                                    <a href="#" class="text-primary">At recusandae
                                                        consectetur</a>
                                                </td>
                                                <td>$147</td>
                                                <td>
                                                    <span class="badge bg-success">Approved</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2644</a></th>
                                                <td>Angus Grady</td>
                                                <td>
                                                    <a href="#" class="text-primar">Ut voluptatem id earum
                                                        et</a>
                                                </td>
                                                <td>$67</td>
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2644</a></th>
                                                <td>Raheem Lehner</td>
                                                <td>
                                                    <a href="#" class="text-primary">Sunt similique
                                                        distinctio</a>
                                                </td>
                                                <td>$165</td>
                                                <td>
                                                    <span class="badge bg-success">Approved</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Recent Sales -->

                    </div>
                </div>
                <!-- End Left side columns -->

            </div>
        </section>
    </main>
@endsection
