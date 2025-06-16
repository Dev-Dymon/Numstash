<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- title and favicon --}}
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    {{-- meta tags --}}
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">

    {{-- css links --}}
    @vite(['resources/css/style.css', 'resources/css/all.min.css', 'resources/css/app.css'])

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- jQuery (required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body>


    {{-- navbar section --}}
    <div class="navbar">
        <a href="{{ route('home') }}">
            <div class="logo">
                <img src="{{ asset('assets/images/dummy-logo.png') }}" alt="" class="app_logo">
            </div>
        </a>

        <div class="menu">
            @guest
                <a href="{{ route('home') }}" class="menu-items">Home</a>
                <a href="{{ route('login') }}" class="menu-items">Get number</a>
                {{-- <a href="#section" class="menu-items">About us</a> --}}
                {{-- <a href="#section" class="menu-items">FAQs</a> --}}
                <a href="{{ route('home') }}/#contact" class="menu-items">Contact us</a>
            @endguest

            @auth
                <a href="{{ route('home') }}" class="menu-items">Home</a>
                <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.index') : route('dashboard') }}"
                    class="menu-items">Get number</a>
                {{-- <a href="#section" class="menu-items">FAQs</a> --}}
                <a href="{{ route('home') }}/#contact" class="menu-items">Contact us</a>
                <a href="{{ route('profile.edit') }}" class="menu-items">Profile</a>
                <form action="{{ route('logout') }}" method="POST" id="logout">
                    @csrf
                    <a href="{{ route('logout') }}" class="menu-items"
                        onclick="event.preventDefault();
                    document.getElementById('logout').submit();">Logout</a>
                </form>
            @endauth
        </div>

        @guest
            <div class="auth">
                <a href="{{ route('register') }}" class="main-btn auth-items">Register</a>

                <a href="{{ route('login') }}" class="main-btn-alt auth-items">Login</a>


                <div class="menu" id="menu-btn">
                    <img src="{{ asset('assets/images/icons/menu-svgrepo-com.svg') }}" alt="">
                </div>
            </div>
        @endguest

        @auth
            <div class="auth">
                <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.index') : route('dashboard') }}">
                    <div class="auth-image">
                        <img src="{{ asset('assets/images/image.png') }}" alt="" class="auth_image">
                    </div>
                </a>

                <div class="menu" id="menu-btn">
                    <img src="{{ asset('assets/images/icons/menu-svgrepo-com.svg') }}" alt="">
                </div>
            </div>
        @endauth
    </div>
    {{-- navbar section --}}


    {{-- sidebar --}}
    <div class="sidebar" id="sidebar">
        <div class="sidebar-head">
            <a href="{{ route('home') }}">
                <div class="logo">
                    <img src="{{ asset('assets/images/dummy-logo.png') }}" alt="" class="app_logo">
                </div>
            </a>

            <div class="menu" id="close-btn">
                <img src="{{ asset('assets/images/icons/close-sm-svgrepo-com.svg') }}" alt="">
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="menu">
                <a href="#section" class="menu-items">Get number</a>
                {{-- <a href="#section" class="menu-items">About us</a> --}}
                {{-- <a href="#section" class="menu-items">FAQs</a> --}}
                <a href="{{ route('home') }}/#contact" class="menu-items">Contact us</a>

                @auth
                    {{-- <a href="{{ route('home') }}/#contact" class="menu-items">Contact us</a> --}}
                    <a href="{{ route('profile.edit') }}" class="menu-items">Profile</a>
                @endauth

                @guest
                    <hr>
                    <a href="{{ route('register') }}" class="menu-items">Register</a>
                    <a href="{{ route('login') }}" class="menu-items">Login</a>
                @endguest

                @auth
                    <hr>
                    <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.index') : route('dashboard') }}"
                        class="menu-items">Dashboard</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="menu-items logout-btn">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
    {{-- sidebar --}}

    {{-- application slot --}}
    @yield('content')
    {{-- application slot --}}

    {{-- js links --}}
    @vite(['resources/js/script.js', 'resources/js/app.js'])
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
    <script>
        const alertElement = document.getElementById('order-completed-alert');
        const dismissButton = document.getElementById('dismiss-alert-btn');

        dismissButton.addEventListener('click', () => {
            alertElement.classList.add('hidden');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#verifications-table').DataTable();
        });
        $(document).ready(function() {
            const table = $('#verifications-table').DataTable();

            // Move and wrap the length and filter in a custom flex container
            const lengthControl = $('.dataTables_length');
            const filterControl = $('.dataTables_filter');

            const topControls = $(
                '<div class="dataTables_wrapper-top min-w-[800px] flex justify-between items-center mb-4"></div>');
            topControls.append(lengthControl).append(filterControl);

            $('.dataTables_wrapper').prepend(topControls);

            // Style the select and input fields with Tailwind
            $('.dataTables_length select').addClass(
                'bg-white border border-gray-300 text-sm rounded-md px-3 py-1.5 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6f42c1]'
            );
            $('.dataTables_filter input').addClass('border border-gray-300 rounded-md px-3 py-2 ml-2');


            setTimeout(() => {
                const paginate = $('.dataTables_paginate');
                paginate.addClass('flex items-center justify-center gap-2 mt-6');

                paginate.find('a').each(function() {
                    const $btn = $(this);

                    $btn.removeClass(); // Remove all existing DataTable styles

                    $btn.addClass(
                        'px-4 py-2 text-sm border rounded-md transition duration-300 cursor-pointer'
                    );

                    if ($btn.hasClass('current')) {
                        $btn.addClass('bg-[#6f42c1] text-white border-[#6f42c1]');
                    } else {
                        $btn.addClass(
                            'bg-white text-[#6f42c1] border-[#6f42c1] hover:bg-[#6f42c1] hover:text-white'
                        );
                    }
                });
            }, 0);

        });
    </script>
</body>

</html>
