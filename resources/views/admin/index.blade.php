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
                <div class="col-lg-8">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
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
                        <div class="col-xxl-4 col-md-6">
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
                                            <h6>$0.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">
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
                                                            show: false,
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
                                                        width: 2,
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

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
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
                                    <h5 class="card-title">
                                        Recent Sales
                                    </h5>

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

                <!-- Right side columns -->
                <div class="col-lg-4">
                    <!-- Recent Activity -->
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
                            <h5 class="card-title">Supported Platforms</h5>

                            <div class="activity">
                                <div class="activity-item d-flex">
                                    <div class="activite-label">32 min</div>
                                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                    <div class="activity-content">
                                        Quia quae rerum
                                        <a href="#" class="fw-bold text-dark">explicabo officiis</a>
                                        beatae
                                    </div>
                                </div>
                                <!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">56 min</div>
                                    <i class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                                    <div class="activity-content">
                                        Voluptatem blanditiis blanditiis eveniet
                                    </div>
                                </div>
                                <!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 hrs</div>
                                    <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                                    <div class="activity-content">
                                        Voluptates corrupti molestias voluptatem
                                    </div>
                                </div>
                                <!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">1 day</div>
                                    <i class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                                    <div class="activity-content">
                                        Tempore autem saepe
                                        <a href="#" class="fw-bold text-dark">occaecati voluptatem</a>
                                        tempore
                                    </div>
                                </div>
                                <!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 days</div>
                                    <i class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                                    <div class="activity-content">
                                        Est sit eum reiciendis exercitationem
                                    </div>
                                </div>
                                <!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">4 weeks</div>
                                    <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                                    <div class="activity-content">
                                        Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                    </div>
                                </div>
                                <!-- End activity item-->
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Activity -->


                    <!-- Website Traffic -->
                    <div class="card">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Website Traffic</h5>

                            <div id="trafficChart" style="min-height: 400px" class="echart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    echarts
                                        .init(document.querySelector("#trafficChart"))
                                        .setOption({
                                            tooltip: {
                                                trigger: "item",
                                            },
                                            legend: {
                                                top: "5%",
                                                left: "center",
                                            },
                                            series: [{
                                                name: "Access From",
                                                type: "pie",
                                                radius: ["40%", "70%"],
                                                avoidLabelOverlap: false,
                                                label: {
                                                    show: false,
                                                    position: "center",
                                                },
                                                emphasis: {
                                                    label: {
                                                        show: true,
                                                        fontSize: "18",
                                                        fontWeight: "bold",
                                                    },
                                                },
                                                labelLine: {
                                                    show: false,
                                                },
                                                data: [{
                                                        value: 1048,
                                                        name: "Search Engine",
                                                    },
                                                    {
                                                        value: 735,
                                                        name: "Direct",
                                                    },
                                                    {
                                                        value: 580,
                                                        name: "Email",
                                                    },
                                                    {
                                                        value: 484,
                                                        name: "Union Ads",
                                                    },
                                                    {
                                                        value: 300,
                                                        name: "Video Ads",
                                                    },
                                                ],
                                            }, ],
                                        });
                                });
                            </script>
                        </div>
                    </div>
                    <!-- End Website Traffic -->

                </div>
                <!-- End Right side columns -->
            </div>
        </section>
    </main>
@endsection
