@extends('layouts.admin')
@section('content')
    <style>
        /* ============== message ================= */
        .user-post {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            width: 100%;
        }

        .user-post:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .profile-img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
        }

        .username {
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 2px;
            cursor: pointer;
        }

        .timestamp {
            font-size: 0.85rem;
            color: #8e8e93;
        }

        {{-- .post-conten {
            color: #3a3a3c;
            line-height: 1.5;
            margin-bottom: 0;
        } --}} .post-content {
            color: #3a3a3c;
            line-height: 1.5;
            margin-bottom: 0;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            cursor: pointer;
        }

        .verified-badge {
            color: #1da1f2;
            font-size: 0.9rem;
            margin-left: 4px;
        }

        /* ============== message ================= */
    </style>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Messages</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Messages</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="container mt-5">
            <div class="row g-3">

                @foreach ($messages as $message)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="user-post p-4">
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('assets/images/image.png') }}" alt="Joanna Dwight"
                                    class="profile-img me-3">

                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center mb-2">
                                        <h6 class="username mb-0" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $message->id }}">{{ $message->name }}</h6>
                                        <i class="fas fa-check-circle verified-badge"></i>
                                        <span class="timestamp ms-auto">{{ $message->date }}</span>
                                    </div>

                                    <p class="post-content" data-bs-toggle="modal"
                                        data-bs-target="#basicModal{{ $message->id }}">
                                        {{ $message->message }}
                                    </p>

                                    {{-- <form action="{{ route('message.delete') }}" method="POST">
                                        @csrf
                                        <input type="number" hidden value="{{ $message->id }}" name="id">
                                        <button class="btn btn-danger mt-2 w-100">Delete</button>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- message modal --}}
                    <div class="modal fade" id="basicModal{{ $message->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><b>{{ $message->name }}</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-header">
                                    <p class="modal-title"><b>{{ $message->email }}</b></p>
                                </div>
                                <div class="modal-body">
                                    {{ $message->message }}
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('message.delete') }}" method="POST">
                                        @csrf
                                        <input type="number" hidden value="{{ $message->id }}" name="id">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- message modal --}}
                @endforeach

                <div>{{ $messages->links('pagination::bootstrap-5') }}</div>
            </div>
        </div>
    </main>
@endsection
