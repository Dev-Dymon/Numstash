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
        </style>

        <div class="min-h-screen bg-white text-gray-800 p-6">
            <!-- Welcome message -->
            <h1 class="text-2xl font-light text-center mb-6">
                Welcome, <span class="text-blue-500 font-medium">{{ Auth::user()->name }}</span>
            </h1>
            <!-- Services Table -->

            <table id="verifications-table" class="w-full text-sm">
                <thead>
                    <tr class="py-5 bg-[#6f42c1] text-white px-6 text-lg font-semibold">
                        <th class="px-6 py-3 text-center">Services</th>
                        <th class="px-6 py-3 text-center">Price</th>
                        <th class="px-6 py-3 text-center">Buy</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b-2 border">
                        <td class="px-6 py-3 text-black text-center">2RedBeans</td>
                        <td class="px-6 py-3 text-black text-center">₦1,434.00</td>
                        <td class="px-6 py-3 text-black text-center">
                            <a href="#"
                                class="bg-[#6f42c1] hover:bg-[#5a33a0] text-white font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                                Buy now
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b-2 border">
                        <td class="px-6 py-3 text-black text-center">3Fun</td>
                        <td class="px-6 py-3 text-black text-center">₦1,434.00</td>
                        <td class="px-6 py-3 text-black text-center">
                            <a href="#"
                                class="bg-[#6f42c1] hover:bg-[#5a33a0] text-white font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                                Buy now
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b-2 border">
                        <td class="px-6 py-3 text-black text-center">7Eleven</td>
                        <td class="px-6 py-3 text-black text-center">₦1,434.00</td>
                        <td class="px-6 py-3 text-black text-center">
                            <a href="#"
                                class="bg-[#6f42c1] hover:bg-[#5a33a0] text-white font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                                Buy now
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b-2 border">
                        <td class="px-6 py-3 text-black text-center">99Ranch</td>
                        <td class="px-6 py-3 text-black text-center">₦1,434.00</td>
                        <td class="px-6 py-3 text-black text-center">
                            <a href="#"
                                class="bg-[#6f42c1] hover:bg-[#5a33a0] text-white font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                                Buy now
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b-2 border">
                        <td class="px-6 py-3 text-black text-center">AARP</td>
                        <td class="px-6 py-3 text-black text-center">₦1,434.00</td>
                        <td class="px-6 py-3 text-black text-center">
                            <a href="#"
                                class="bg-[#6f42c1] hover:bg-[#5a33a0] text-white font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                                Buy now
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>


            <!-- Verifications Table -->
            <div class="mt-10 bg-white rounded-xl shadow-md p-4">
                <h2 class="text-[#6f42c1] text-lg font-medium mb-4">VERIFICATIONS</h2>
                <div class="overflow-x-auto">
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
        </div>

    </div>
@endsection
