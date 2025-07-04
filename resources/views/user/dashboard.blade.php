@extends('layouts.webapp')
@section('content')
    <div class="py-12 mx-20px">
        <style>
            /* Arrange length and filter in a row */
            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                margin-bottom: 1rem;
            }

            /* Flex container for top controls */
            .dataTables_wrapper .dataTables_wrapper-top {
                display: flex !important;
                justify-content: space-between;
                flex-wrap: wrap;
                align-items: center;
                margin-bottom: 1rem;
            }

            .dataTables_wrapper select,
            .dataTables_wrapper input {
                background-color: white !important;
                color: black !important;
                border: 1px solid #ccc !important;
                border-radius: 0.375rem;
                /* rounded-md */
                padding: 0.5rem;
                display: inline;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button {
                background-color: white !important;
                color: #4b5563 !important;
                /* gray-700 */
                border: 1px solid #ccc !important;
                padding: 0.375rem 0.75rem;
                margin: 0 0.25rem;
                border-radius: 0.375rem;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                background-color: #f3f4f6 !important;
                /* gray-100 */
                color: black !important;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                background-color: #6f42c1 !important;
                /* purple */
                color: white !important;
            }


            .modal-fade-enter-active,
            .modal-fade-leave-active {
                transition: opacity 0.3s ease;
            }

            .modal-fade-enter-from,
            .modal-fade-leave-to {
                opacity: 0;
            }

            .modal-scale-enter-active,
            .modal-scale-leave-active {
                transition: transform 0.3s ease, opacity 0.3s ease;
            }

            .modal-scale-enter-from,
            .modal-scale-leave-to {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.9);
            }
        </style>

        {{-- alert --}}
        @if (Session::has('error'))
            <div id="dangerAlert"
                class="fixed top-4 right-4 z-50 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md flex items-start justify-between max-w-md"
                role="alert">
                <!-- Alert message content -->
                <div class="flex items-center">
                    <!-- Exclamation Icon (optional, using SVG for simple icon) -->
                    <svg class="h-6 w-6 text-red-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                    <div>
                        <span class="block sm:inline">{{ Session::get('error') }}</span>
                    </div>
                </div>

                <!-- Dismiss Button -->
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 justify-center items-center"
                    aria-label="Dismiss" onclick="dismissAlert()">
                    <!-- X Icon for dismiss button (using SVG) -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        {{-- alert --}}

        {{-- alert --}}
        @if (Session::has('success'))
            <div id="dangerAlert"
                class="fixed top-4 right-4 z-50 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg shadow-md flex items-start justify-between max-w-md"
                role="alert">
                <!-- Alert message content -->
                <div class="flex items-center">
                    <!-- Exclamation Icon (optional, using SVG for simple icon) -->
                    <svg class="h-6 w-6 text-green-800 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
                            fill="#292D32" />
                    </svg>
                    <div>
                        <span class="block sm:inline">{{ Session::get('success') }}</span>
                    </div>
                </div>

                <!-- Dismiss Button -->
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 justify-center items-center"
                    aria-label="Dismiss" onclick="dismissAlert()">
                    <!-- X Icon for dismiss button (using SVG) -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        {{-- alert --}}

        <div class="min-h-screen bg-white text-gray-800 p-6">
            <!-- Welcome message -->
            <div class="flex justify-between align-center">
                <h1 class="text-2xl font-light text-center mb-6">
                    Welcome, <span class="text-blue-500 font-medium">{{ Auth::user()->name }}</span>
                </h1>
                <div>
                    @if ($wallet->balance)
                        <p class="main-btn">₦{{ number_format($wallet->balance, 2) }}</p>
                    @else
                        <p class="main-btn">₦0</p>
                    @endif
                </div>
            </div>

            <button id="openModalBtn" class="main-btn cursor-pointer">
                Fund account
            </button>

            <!-- Services Table -->
            <div class="w-full max-w-screen px-4 py-6" x-data="{ activeTab: 'tab1' }">
                <!-- Tabs -->
                <div class="border-b border-gray-300">
                    <div class="flex justify-between text-sm font-medium text-gray-600">
                        <button class="w-full py-4 border-b-2"
                            :class="activeTab === 'tab1' ? 'border-indigo-500 text-indigo-600' :
                                'border-transparent hover:border-gray-300 hover:text-gray-700'"
                            @click="activeTab = 'tab1'">
                            United States
                        </button>
                        <button class="w-full py-4 border-b-2"
                            :class="activeTab === 'tab2' ? 'border-indigo-500 text-indigo-600' :
                                'border-transparent hover:border-gray-300 hover:text-gray-700'"
                            @click="activeTab = 'tab2'">
                            United Kingdom
                        </button>
                    </div>
                </div>

                <!-- Tab content -->
                <div class="mt-6">
                    <div x-show="activeTab === 'tab1'">
                        <div class="overflow-x-auto w-full overflow-y-hidden h-fit py-2">
                            <table id="verifications-table" class="w-full text-sm min-w-[800px] mx-auto"
                                style="min-width: 800px;">
                                <thead>
                                    <tr class="py-5 bg-[#6f42c1] text-white px-6 text-lg font-semibold">
                                        <th class="px-6 py-3 text-center">Services</th>
                                        <th class="px-6 py-3 text-center">Country</th>
                                        <th class="px-6 py-3 text-center">Price</th>
                                        <th class="px-6 py-3 text-center min-w-[80px]">Buy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        @php
                                            $apiPrice1 = $amount * $service['price'];
                                            $salePrice1 = $apiPrice1 + $added; // your profit
                                        @endphp
                                        <tr class="bg-white border-b-2 border">
                                            <td class="px-6 py-3 text-black text-center">{{ $service['service'] }}</td>
                                            <td class="px-6 py-3 text-black text-center">{{ $service['country'] }}</td>
                                            <td class="px-6 py-3 text-black text-center">
                                                ₦{{ number_format($salePrice1, 2) }}</td>
                                            <td class="px-6 py-3 text-black text-center">
                                                <form action="{{ route('dashboard.buy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="service" value="{{ $service['service'] }}">
                                                    <input type="hidden" name="service_key" value="{{ $service['key'] }}">
                                                    <input type="hidden" name="api_price" value="{{ $apiPrice1 }}">
                                                    <input type="hidden" name="sale_price" value="{{ $salePrice1 }}">
                                                    <input type="hidden" name="request_premium"
                                                        value="{{ $service['has_premium'] }}">
                                                    <input type="hidden" name="state" value="AL">

                                                    <button type="submit"
                                                        class="bg-[#6f42c1] hover:bg-[#5a33a0] text-white font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                                                        Buy now
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div x-show="activeTab === 'tab2'" x-cloak>
                        <div class="overflow-x-auto w-full overflow-y-hidden h-fit py-2">
                            <table id="verifications-table2" class="w-full text-sm min-w-[800px] mx-auto"
                                style="min-width: 800px;">
                                <thead>
                                    <tr class="py-5 bg-[#6f42c1] text-white px-6 text-lg font-semibold">
                                        <th class="px-6 py-3 text-center">Services</th>
                                        <th class="px-6 py-3 text-center">Country</th>
                                        <th class="px-6 py-3 text-center">Price</th>
                                        <th class="px-6 py-3 text-center min-w-[80px]">Buy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicesuk as $serviceuk)
                                        @php
                                            $apiPrice = $amount * $serviceuk['price'];
                                            $salePrice = $apiPrice + $added; // your profit
                                        @endphp
                                        <tr class="bg-white border-b-2 border">
                                            <td class="px-6 py-3 text-black text-center">{{ $serviceuk['service'] }}</td>
                                            <td class="px-6 py-3 text-black text-center">{{ $serviceuk['country'] }}</td>
                                            <td class="px-6 py-3 text-black text-center">
                                                ₦{{ number_format($salePrice, 2) }}
                                            </td>
                                            <td class="px-6 py-3 text-black text-center">
                                                <form action="{{ route('dashboard.buy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="service"
                                                        value="{{ $serviceuk['service'] }}">
                                                    <input type="hidden" name="service_key"
                                                        value="{{ $serviceuk['key'] }}">
                                                    <input type="hidden" name="api_price" value="{{ $apiPrice }}">
                                                    <input type="hidden" name="sale_price" value="{{ $salePrice }}">
                                                    <input type="hidden" name="request_premium" value="10">
                                                    <input type="hidden" name="state" value="AL">

                                                    <button type="submit"
                                                        class="bg-[#6f42c1] hover:bg-[#5a33a0] text-white font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                                                        Buy now
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Verifications Table -->
            <div class="mt-10 bg-white rounded-xl shadow-md p-4">
                <h2 class="text-[#6f42c1] text-lg font-medium mb-4">VERIFICATIONS</h2>
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full text-sm text-left border">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">SERVICE</th>
                                <th class="px-4 py-2 border">PHONE NO</th>
                                <th class="px-4 py-2 border">TIMER</th>
                                <th class="px-4 py-2 border">CODE</th>
                                <th class="px-4 py-2 border">PRICE</th>
                                <th class="px-4 py-2 border">STATUS</th>
                                <th class="px-4 py-2 border">DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center text-gray-500 py-4">No verification found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            {{-- ==================== Modal ===================== --}}
            <!-- The Modal Container (initially hidden) -->
            <div id="myModal"
                class="hidden fixed inset-0 flex items-center justify-center z-50 transition-opacity duration-300 ease-in-out">
                <!-- Modal Overlay/Backdrop -->
                <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity duration-300 ease-in-out"
                    onclick="closeModal()"></div>

                <!-- Modal Dialog -->
                <div class="bg-white rounded-lg shadow-2xl p-6 w-full max-w-sm mx-auto z-10 transform transition-transform duration-300 ease-in-out"
                    onclick="event.stopPropagation();">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900">Fund Account</h3>
                        <button type="button"
                            class="text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out"
                            onclick="closeModal()">
                            <!-- Close Icon (X) using SVG -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <form action="{{ route('wallet.paystack') }}" method="POST">
                        @csrf
                        <div class="py-4 text-gray-700">
                            <p>Enter amount in naira(₦)</p>
                            <input type="number" placeholder="Enter your amount" name="amount"
                                value="{{ old('amount') }}" min="100" step="0.01" required
                                class="w-full mt-1 px-4 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-[--primary-color] focus:border-[--primary-color]" />
                        </div>

                        <!-- Modal Footer -->
                        <div class="pt-4 border-t border-gray-200 flex justify-end space-x-2">
                            <button type="submit"
                                class="px-[30px] py-2 bg-green-800 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Fund
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            {{-- ==================== Modal ===================== --}}
        </div>

    </div>

    <script>
        // JavaScript function to dismiss the alert
        function dismissAlert() {
            const alertElement = document.getElementById('dangerAlert');
            if (alertElement) {
                alertElement.classList.add('hidden'); // Add 'hidden' class to hide the alert
            }
        }

        const modal = document.getElementById('myModal');
        const openModalBtn = document.getElementById('openModalBtn');

        function openModal() {
            modal.classList.remove('hidden');
            // Add transition classes for fade-in and scale-in effect
            modal.classList.add('modal-fade-enter-active');
            setTimeout(() => {
                modal.firstElementChild.nextElementSibling.classList.add('modal-scale-enter-active');
            }, 10); // Small delay to allow fade-in to start
        }

        function closeModal() {
            // Add transition classes for fade-out and scale-out effect
            modal.firstElementChild.nextElementSibling.classList.remove('modal-scale-enter-active');
            modal.firstElementChild.nextElementSibling.classList.add('modal-scale-leave-active');
            modal.classList.remove('modal-fade-enter-active');
            modal.classList.add('modal-fade-leave-active');

            setTimeout(() => {
                modal.classList.add('hidden');
                // Clean up transition classes
                modal.classList.remove('modal-fade-leave-active');
                modal.firstElementChild.nextElementSibling.classList.remove('modal-scale-leave-active');
            }, 300); // Match transition duration
        }

        // Event listener to open the modal
        openModalBtn.addEventListener('click', openModal);

        // Optional: Close modal on Escape key press
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    </script>
@endsection
