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
