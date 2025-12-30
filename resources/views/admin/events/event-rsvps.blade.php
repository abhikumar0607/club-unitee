@extends('layouts.admin-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <nav class="top-navbar d-flex justify-content-end align-items-center px-4 shadow-sm">
            <x-admin-dashboard-nav-profile />
        </nav>

        <!-- HEADER -->
        <section class="page-header text-center py-3">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h1 class="page-title">Events Rsvps</h1>
                <div class="main-back-btn-11" bis_skin_checked="1">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary back-button">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </section>


        <!-- ================== EVENTS SECTION ================== -->
        <section class="pb-5">
            <div class="container">
                <!-- EVENTS TABLE CARD -->
                <div class="card card-uni p-4">
                    <h4 class="fw-bold text-uni mb-4">Rsvp List</h4>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Member Name</th>
                                    <th>Email</th>
                                    <th>RSVP date</th>
                                </tr>
                            </thead>

                            <tbody>

                                @if ($events->count() > 0)
                                    @php $count = 1; @endphp
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $count ++ }}.</td>
                                            <td>{{ $event->user->name }}</td> 
                                            <td>{{ $event->user->email }}</td>
                                            <td>{{ \Carbon\Carbon::parse($event->created_at)->format('d M, Y') }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No events rsvp found.</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                    <!-- PAGINATION -->
                    <div class="mt-3">
                        {{ $events->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </section>
    @endsection
