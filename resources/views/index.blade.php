@extends('layouts.webapp')

{{-- meta tags --}}
@section('title', 'Get virtual number')
@section('meta_description', 'This is the home page of the web application.')
@section('meta_keywords', 'home, web application, laravel')
{{-- meta tags --}}

{{-- application layout --}}
@section('content')
    {{-- hero section --}}
    <div class="hero"
        style="background: linear-gradient(180deg, #fff9, #fff9), url('{{ asset('assets/images/world-map.jpg') }}') ;
           background-size: cover;
            background-position: center;
            background-repeat: no-repeat; ">
        <div class="hero-box">
            <h1>Get a Virtual Phone Number Now</h1>
            <p>Harness the capabilities of a virtual phone number. Escape the limitations of conventional communication and
                connect with anyone
                globally at any time. Obtain an instant virtual phone number from us and establish an online presence for
                your business.</p>

            @guest
                <a href="{{ route('register') }}" class="main-btn">Get started</a>
            @endguest
            @auth
                <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.index') : route('dashboard') }}" class="main-btn">Get
                    a number</a>
            @endauth
        </div>
    </div>
    {{-- hero section --}}

    {{-- how it works section --}}
    <section class="bg-white py-16 px-6 md:px-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">How It Works</h2>
            <p class="text-gray-500 mt-2">Get your virtual number in just a few easy steps</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="bg-gray-50 rounded-2xl shadow p-8 hover:shadow-lg transition duration-300 text-center">
                <div class="flex justify-center mb-4">
                    <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-1.105 0-2 .672-2 1.5S10.895 11 12 11s2-.672 2-1.5S13.105 8 12 8z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Top Up Wallet</h3>
                <p class="text-gray-500 text-sm">Add funds to your account securely via card or crypto.</p>
            </div>

            <!-- Step 2 -->
            <div class="bg-gray-50 rounded-2xl shadow p-8 hover:shadow-lg transition duration-300 text-center">
                <div class="flex justify-center mb-4">
                    <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Choose Number</h3>
                <p class="text-gray-500 text-sm">Select a country and app (like WhatsApp or Telegram).</p>
            </div>

            <!-- Step 3 -->
            <div class="bg-gray-50 rounded-2xl shadow p-8 hover:shadow-lg transition duration-300 text-center">
                <div class="flex justify-center mb-4">
                    <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Receive SMS</h3>
                <p class="text-gray-500 text-sm">Get your verification code instantly in your dashboard.</p>
            </div>
        </div>
    </section>
    {{-- how it works section --}}


    <section class="bg-white py-16 px-6 md:px-20">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                Most Supported Platforms for Virtual Numbers
            </h2>
            <p class="text-gray-500 mt-2">Compatible with popular apps worldwide</p>
        </div>

        <div class="platform_grid">

            <div class="platform_item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="w-10 h-10 fill-current text-gray-500 hover:text-purple-600 transition-colors">
                    <path
                        d="M22.675 0H1.325C.593 0 0 .594 0 1.326v21.348C0 23.406.593 24 1.325 24H12.82v-9.294H9.692V11.08h3.128V8.412c0-3.1 1.894-4.788 4.658-4.788 1.325 0 2.464.1 2.796.143v3.241l-1.918.001c-1.505 0-1.796.716-1.796 1.763v2.311h3.587l-.467 3.626h-3.12V24h6.116C23.407 24 24 23.406 24 22.674V1.326C24 .594 23.407 0 22.675 0z" />
                </svg>
            </div>

            <div class="platform_item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                    class="w-10 h-10 fill-current text-gray-500 hover:text-purple-600 transition-colors">
                    <path
                        d="M16.005 2.003a13.944 13.944 0 0 0-12.015 21.332L2 30l6.862-1.977A13.957 13.957 0 1 0 16.005 2zm7.953 19.883c-.337.953-1.97 1.85-2.729 1.97-.71.12-1.607.171-2.607-.171-.601-.2-1.362-.445-2.344-.877-4.125-1.783-6.824-6.27-7.045-6.57-.223-.3-1.68-2.22-1.68-4.238 0-2.02 1.058-3.015 1.434-3.42.336-.367.895-.534 1.188-.534.297 0 .594.003.855.015.276.012.641-.103 1.007.767.385.9 1.304 3.113 1.416 3.34.115.228.193.499.036.796-.16.3-.24.486-.468.747-.223.263-.468.586-.668.787-.223.223-.456.467-.198.917.263.45 1.166 1.922 2.504 3.113 1.725 1.535 3.175 2.014 3.63 2.234.453.228.712.204.975-.12.263-.327 1.118-1.304 1.417-1.748.296-.437.59-.361.973-.215.386.147 2.443 1.153 2.86 1.362.417.215.69.326.792.502.1.18.1 1.05-.237 2.003z" />
                </svg>
            </div>

            <div class="platform_item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1227"
                    class="w-10 h-10 fill-current text-gray-500 hover:text-purple-600 transition-colors">
                    <path
                        d="M713 556L1175 0h-106L659 465 293 0H0l496 651L16 1227h108L545 733l382 494h273L713 556Zm-91 113l-65-83-393-514h132l317 416 65 83 401 525h-133l-324-427Z" />
                </svg>
            </div>

            <div class="platform_item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="w-10 h-10 fill-current text-gray-500 hover:text-purple-600 transition-colors">
                    <path
                        d="M20.447 20.452H17.21v-5.569c0-1.327-.025-3.037-1.852-3.037-1.853 0-2.136 1.446-2.136 2.94v5.666H9.075V9h3.104v1.561h.045c.433-.82 1.492-1.684 3.07-1.684 3.287 0 3.893 2.164 3.893 4.978v6.597zM5.337 7.433c-.994 0-1.797-.805-1.797-1.797 0-.994.803-1.797 1.797-1.797.993 0 1.797.803 1.797 1.797 0 .992-.804 1.797-1.797 1.797zM6.556 20.452H4.116V9h2.44v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.226.792 24 1.771 24h20.451C23.2 24 24 23.226 24 22.271V1.729C24 .774 23.2 0 22.225 0z" />
                </svg>
            </div>

            <div class="platform_item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 71 55"
                    class="w-10 h-10 fill-current text-gray-500 hover:text-purple-600 transition-colors">
                    <path
                        d="M60.104 4.552A58.66 58.66 0 0 0 46.8.612a.211.211 0 0 0-.221.105c-1.948 3.43-4.104 7.888-5.627 11.43a55.037 55.037 0 0 0-16.43 0C22.987 8.605 21.01 4.146 19.95 0a.212.212 0 0 0-.222-.105A58.677 58.677 0 0 0 .892 4.552a.2.2 0 0 0-.094.08C-1.477 11.382-2.63 18.09-2.824 24.743c-.004.113.08.212.188.225a59.318 59.318 0 0 0 17.623 4.73.212.212 0 0 0 .225-.15 41.223 41.223 0 0 0 2.46-8.006.211.211 0 0 0-.114-.233 30.09 30.09 0 0 1-4.596-2.294.212.212 0 0 1-.02-.35c.31-.235.62-.47.92-.698a.211.211 0 0 1 .227-.018c9.686 4.447 20.16 4.447 29.786 0a.211.211 0 0 1 .228.017c.3.23.61.464.92.7a.211.211 0 0 1-.019.35 28.73 28.73 0 0 1-4.596 2.292.212.212 0 0 0-.113.234c.693 2.78 1.564 5.53 2.46 8.005a.212.212 0 0 0 .225.15 59.297 59.297 0 0 0 17.624-4.73.213.213 0 0 0 .188-.225c-.2-6.653-1.353-13.361-3.81-20.111a.2.2 0 0 0-.093-.081zM23.725 37.002c-3.03 0-5.51-2.785-5.51-6.215 0-3.43 2.45-6.215 5.51-6.215 3.07 0 5.52 2.805 5.51 6.215 0 3.43-2.44 6.215-5.51 6.215zm23.575 0c-3.03 0-5.51-2.785-5.51-6.215 0-3.43 2.45-6.215 5.51-6.215 3.07 0 5.52 2.805 5.51 6.215 0 3.43-2.44 6.215-5.51 6.215z" />
                </svg>
            </div>

            <div class="platform_item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                    class="w-10 h-10 fill-current text-gray-500 hover:text-purple-600 transition-colors">
                    <path fill="#FFC107"
                        d="M43.6 20.5H42V20H24v8h11.3C34 32.5 29.6 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.9 1.2 8 3.1l5.7-5.7C34.3 6.2 29.4 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20c11 0 20-9 20-20 0-1.3-.1-2.7-.4-3.9z" />
                    <path fill="#FF3D00"
                        d="M6.3 14.7l6.6 4.8C14.5 15.1 18.9 12 24 12c3.1 0 5.9 1.2 8 3.1l5.7-5.7C34.3 6.2 29.4 4 24 4 15.2 4 7.8 9.6 6.3 14.7z" />
                    <path fill="#4CAF50"
                        d="M24 44c5.4 0 10.3-2.1 14-5.6l-6.5-5.5C29.8 34.9 27 36 24 36c-5.6 0-10-3.5-11.6-8.5l-6.6 5.1C7.8 38.4 15.2 44 24 44z" />
                    <path fill="#1976D2"
                        d="M43.6 20.5H42V20H24v8h11.3c-1.3 3.5-4.9 6-9.3 6-5.6 0-10-4.4-10-10s4.4-10 10-10c2.6 0 4.9.9 6.6 2.4l6.6-6.6C34.5 6.6 29.6 4 24 4c-9.6 0-17.6 6.3-20.3 15.1l6.6 5.1C11.7 27.3 17.3 32 24 32c4.3 0 8-2.3 9.3-5.7H24v-6h19.6c.2.9.4 1.9.4 3 0 1.5-.2 3-.4 4.3z" />
                </svg>
            </div>

            <div class="platform_item">

            </div>

            <div class="platform_item">

            </div>

        </div>
    </section>


    <style>
        :root {
            --primary-color: #6f42c1;
        }
    </style>

    <div class="grid place-items-center mb-10" id="contact">
        <div class="w-full max-w-[85vw] sm:max-w-[550px] bg-white border border-[--primary-color] rounded-lg shadow p-6">
            <h2 class="text-center text-2xl font-semibold text-[--primary-color] mb-6">Contact Us</h2>
            <form class="space-y-4" action="{{ route('message.send') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" placeholder="Your name" name="name" value="{{ old('name') }}"
                        class="w-full mt-1 px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-[--primary-color] focus:border-[--primary-color]" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" placeholder="you@example.com" name="email" value="{{ old('email') }}"
                        class="w-full mt-1 px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-[--primary-color] focus:border-[--primary-color]" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea rows="4" placeholder="Your message..." name="message" value="{{ old('message') }}"
                        class="w-full mt-1 px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-[--primary-color] focus:border-[--primary-color]"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-[--primary-color] text-white font-medium px-6 py-2 rounded-md hover:bg-opacity-90 transition">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if (Session::has('error'))
        <div id="order-completed-alert"
            class="fixed top-4 right-4 z-50
                                            bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg shadow-lg
                                            max-w-sm w-full alert-transition">
            <div class="flex items-start">
                <div class="flex-shrink-0 mr-3">
                    <svg class="h-6 w-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-lg">Error</p>
                    <p class="text-sm mt-1 text-red-700">
                        {{ Session('error') }}
                    </p>
                    <div class="mt-4 flex space-x-4">
                        <button id="dismiss-alert-btn"
                            class="text-sm font-medium text-red-700 hover:text-red-900 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 rounded-md">
                            Dismiss
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Session::has('success'))
        <div id="order-completed-alert"
            class="fixed top-4 right-4 z-50
                                            bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-lg
                                            max-w-sm w-full alert-transition">
            <div class="flex items-start">
                <div class="flex-shrink-0 mr-3">
                    <svg class="h-6 w-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-lg">Success</p>
                    <p class="text-sm mt-1 text-green-700">
                        {{ Session('success') }}
                    </p>
                    <div class="mt-4 flex space-x-4">
                        <button id="dismiss-alert-btn"
                            class="text-sm font-medium text-green-700 hover:text-green-900 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">
                            Dismiss
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div id="order-completed-alert"
                    class="fixed top-4 right-4 z-50
                                            bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-lg
                                            max-w-sm w-full alert-transition">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mr-3">
                            <svg class="h-6 w-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-lg">Success</p>
                            <p class="text-sm mt-1 text-green-700">
                                {{ $error }}
                            </p>
                            <div class="mt-4 flex space-x-4">
                                <a href="#"
                                    class="text-sm font-medium text-green-700 hover:text-green-900 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">
                                    View status
                                </a>
                                <button id="dismiss-alert-btn"
                                    class="text-sm font-medium text-green-700 hover:text-green-900 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">
                                    Dismiss
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
