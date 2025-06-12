@extends('layouts.admin')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Avaliable number</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">avaliable number</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <input type="text" id="search" class="form-control mb-3" placeholder="Search table..." style="max-width: 300px;">

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
                        <td>${{ number_format($service['price'], 2) }}</td>
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

    </main>
@endsection
