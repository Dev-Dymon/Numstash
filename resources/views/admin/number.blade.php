@extends('layouts.admin')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
            style="position: fixed; width: fit-content; top: 1rem; right: 1rem; z-index: 999;">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"
            style="position: fixed ; width: fit-content; top: 1rem; right: 1rem; z-index: 999;">
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Avaliable number</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">avaliable number</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#amountModal">Change Amount</button>
            </div>
        </div>
        <!-- End Page Title -->

        <input type="text" id="search" class="form-control mb-3" placeholder="Search table..."
            style="max-width: 300px;">

        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home"
                    aria-selected="true">United States</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile"
                    aria-selected="false">United Kingdom</button>
            </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            {{-- united States --}}
            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-bordered table-hover" id="data-table">
                    <thead class="table-dark">
                        <tr>
                            <th class="sortable" data-column="0">ID</th>
                            <th class="sortable" data-column="1">Service</th>
                            <th class="sortable" data-column="2">Country</th>
                            <th class="sortable" data-column="2">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $service['service'] }}</td>
                                <td>{{ $service['country'] }}</td>
                                <td>₦{{ number_format($nigerian_amount * $service['price'] + $added_amount->added_amount, 2) }}
                                </td>
                            </tr>

                            @php
                                $id++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination" id="pagination"></ul>
                </nav>
            </div>
            {{-- united States --}}

            {{-- united kindom --}}
            <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-bordered table-hover" id="data-table2">
                    <thead class="table-dark">
                        <tr>
                            <th class="sortable" data-column="0">ID</th>
                            <th class="sortable" data-column="1">Service</th>
                            <th class="sortable" data-column="2">Country</th>
                            <th class="sortable" data-column="2">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @foreach ($servicesuk as $serviceuk)
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $serviceuk['service'] }}</td>
                                <td>{{ $serviceuk['country'] }}</td>
                                <td>₦{{ number_format($nigerian_amount * $serviceuk['price'] + $added_amount->added_amount, 2) }}
                                </td>
                            </tr>

                            @php
                                $id++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination" id="pagination2"></ul>
                </nav>
            </div>
            {{-- united kindom --}}
        </div>


        {{-- ========================== Modal ========================= --}}
        <div class="modal fade" id="amountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Change the profit you which to make</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.number.profit') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Amount ₦</label>
                                <input type="number" class="form-control" name="amount"
                                    value="{{ $added_amount->added_amount }}">
                                @error('amount')
                                    <div class="fs-6 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="mb-3">
                                <button class="btn btn-success px-5" type="submit">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- ========================== Modal ========================= --}}

    </main>
@endsection
