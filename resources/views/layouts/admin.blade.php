<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Get virtual number - Admin Dashboard</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('assets/images/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/images/favicon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css"> --}}
    <style>
        th.sortable {
            cursor: pointer;
        }

        th.sortable::after {
            content: ' \25B4\25BE';
            font-size: 0.7rem;
            color: #6c757d;
        }
    </style>

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.index') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/images/dummy-logo.png') }}" alt="" />
                {{-- <span class="d-none d-lg-block">Admin Panel</span> --}}
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        {{-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
                <button type="submit" title="Search">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div> --}}
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span> </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>
                    </ul>
                    <!-- End Notification Dropdown Items -->
                </li>
                <!-- End Notification Nav -->

                <li class="nav-item">
                    <a class="nav-link nav-icon" href="{{ route('admin.message') }}">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span> </a><!-- End Messages Icon -->

                    {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle" />
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>
                                        Velit asperiores et ducimus soluta repudiandae labore
                                        officia est ut...
                                    </p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle" />
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>
                                        Velit asperiores et ducimus soluta repudiandae labore
                                        officia est ut...
                                    </p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle" />
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>
                                        Velit asperiores et ducimus soluta repudiandae labore
                                        officia est ut...
                                    </p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="dropdown-footer">
                            <a href="{{ route('admin.message') }}">Show all messages</a>
                        </li>
                    </ul> --}}
                    <!-- End Messages Dropdown Items -->
                </li>
                <!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/images/image.png') }}" alt="Profile" class="rounded-circle" />
                        @guest
                            <span class="d-none d-md-block dropdown-toggle ps-2">Admin user</span>
                        @endguest
                        @auth
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                        @endauth
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            @guest
                                <h6>Diamond</h6>
                            @endguest
                            @auth
                                <h6>{{ Auth::user()->name }}</h6>
                            @endauth

                            @guest
                                <span>admin</span>
                            @endguest
                            @auth
                                <span>{{ Auth::user()->usertype }}</span>
                            @endauth


                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.setting') }}">
                                <i class="bi bi-gear"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </button>
                    </form>
                </li>
            </ul>
            <!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.number') }}">
                    <i class="bi bi-phone"></i>
                    <span>Numbers</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.message') }}">
                    <i class="bi bi-chat-left-text"></i>
                    <span>Messages</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('home') }}">
                    <i class="bi bi-globe"></i>
                    <span>Visit website</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.setting') }}">
                    <i class="bi bi-gear"></i>
                    <span>Settings</span>
                </a>
            </li>

            <li class="nav-item" style="display: block;">
                <form action="{{ route('logout') }}" method="post" style="display: block;">
                    @csrf
                    <button class="nav-link collapsed" style="display: block;">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
            <!-- End Blank Page Nav -->
        </ul>
    </aside>
    <!-- End Sidebar-->

    {{-- main --}}
    @yield('content')
    <!-- End #main -->


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Virtual Number</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://www.ipointhub.com/">Ipoint Hub</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script> --}}

    <script>
        {const table = document.getElementById('data-table');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const searchInput = document.getElementById('search');
        const pagination = document.getElementById('pagination');
        const rowsPerPage = 20;
        let currentPage = 1;
        let currentRows = [...rows];
        let currentSort = {
            index: null,
            direction: 'asc'
        };

        function renderTable(page = 1) {
            tbody.innerHTML = '';
            const start = (page - 1) * rowsPerPage;
            const paginatedRows = currentRows.slice(start, start + rowsPerPage);
            paginatedRows.forEach(row => tbody.appendChild(row));
            renderPagination(currentRows.length, page);
        }

        function renderPagination(total, current) {
            pagination.innerHTML = '';
            const totalPages = Math.ceil(total / rowsPerPage);
            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement('li');
                li.className = 'page-item' + (i === current ? ' active' : '');
                li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                li.addEventListener('click', e => {
                    e.preventDefault();
                    currentPage = i;
                    renderTable(currentPage);
                });
                pagination.appendChild(li);
            }
        }

        function filterTable(query) {
            currentRows = rows.filter(row => {
                return Array.from(row.cells).some(cell =>
                    cell.textContent.toLowerCase().includes(query.toLowerCase())
                );
            });
            currentPage = 1;
            renderTable();
        }

        function sortTable(index) {
            const direction = (currentSort.index === index && currentSort.direction === 'asc') ? 'desc' : 'asc';
            currentSort = {
                index,
                direction
            };

            currentRows.sort((a, b) => {
                const aText = a.cells[index].textContent.trim();
                const bText = b.cells[index].textContent.trim();
                return direction === 'asc' ?
                    aText.localeCompare(bText, undefined, {
                        numeric: true
                    }) :
                    bText.localeCompare(aText, undefined, {
                        numeric: true
                    });
            });

            renderTable(currentPage);
        }

        document.querySelectorAll('th.sortable').forEach(th => {
            th.addEventListener('click', () => sortTable(parseInt(th.dataset.column)));
        });

        searchInput.addEventListener('input', () => {
            filterTable(searchInput.value);
        });

        // Initial render
        renderTable();}

        {const table = document.getElementById('data-table2');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const searchInput = document.getElementById('search');
        const pagination = document.getElementById('pagination2');
        const rowsPerPage = 20;
        let currentPage = 1;
        let currentRows = [...rows];
        let currentSort = {
            index: null,
            direction: 'asc'
        };

        function renderTable(page = 1) {
            tbody.innerHTML = '';
            const start = (page - 1) * rowsPerPage;
            const paginatedRows = currentRows.slice(start, start + rowsPerPage);
            paginatedRows.forEach(row => tbody.appendChild(row));
            renderPagination(currentRows.length, page);
        }

        function renderPagination(total, current) {
            pagination.innerHTML = '';
            const totalPages = Math.ceil(total / rowsPerPage);
            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement('li');
                li.className = 'page-item' + (i === current ? ' active' : '');
                li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                li.addEventListener('click', e => {
                    e.preventDefault();
                    currentPage = i;
                    renderTable(currentPage);
                });
                pagination.appendChild(li);
            }
        }

        function filterTable(query) {
            currentRows = rows.filter(row => {
                return Array.from(row.cells).some(cell =>
                    cell.textContent.toLowerCase().includes(query.toLowerCase())
                );
            });
            currentPage = 1;
            renderTable();
        }

        function sortTable(index) {
            const direction = (currentSort.index === index && currentSort.direction === 'asc') ? 'desc' : 'asc';
            currentSort = {
                index,
                direction
            };

            currentRows.sort((a, b) => {
                const aText = a.cells[index].textContent.trim();
                const bText = b.cells[index].textContent.trim();
                return direction === 'asc' ?
                    aText.localeCompare(bText, undefined, {
                        numeric: true
                    }) :
                    bText.localeCompare(aText, undefined, {
                        numeric: true
                    });
            });

            renderTable(currentPage);
        }

        document.querySelectorAll('th.sortable').forEach(th => {
            th.addEventListener('click', () => sortTable(parseInt(th.dataset.column)));
        });

        searchInput.addEventListener('input', () => {
            filterTable(searchInput.value);
        });

        // Initial render
        renderTable();}
    </script>

</body>

</html>
