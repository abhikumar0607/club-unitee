@extends('layouts.customer-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOP NAVBAR -->
        <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
            <h4 class="m-0 fw-bold text-uni">Connections</h4>
            <x-customer-dashboard-nav-profile />
        </nav>

        <!-- HEADER -->
        <section class="page-header text-center py-5">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <h1 class="page-title">My Connections</h1>
                <p class="page-subtitle">Manage your network and connection requests.</p>
            </div>
        </section>

        <!-- TABS -->
        <section class="pb-3">
            <div class="container text-center main-color-11">
                <ul class="nav nav-pills justify-content-center connections-tabs">
                    <li class="nav-item">
                        <a class="nav-link1 active" data-bs-toggle="pill" href="#all">All Connections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link1" data-bs-toggle="pill" href="#sent">Sent Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link1" data-bs-toggle="pill" href="#received">Received Requests</a>
                    </li>
                </ul>
            </div>
        </section>

        <section class="pb-5">
            <div class="container">

                <div class="tab-content">

                    <!-- ALL CONNECTIONS -->
                    <div class="tab-pane fade show active" id="all">

                       @if($connections && !$connections->isEmpty())
                            <div class="row g-4 mt-3">

                                @foreach ($connections as $user)
                                    <div class="col-md-4">
                                        <div class="card card-uni p-3 text-center">

                                            <!-- PROFILE PHOTO -->
                                            <div class="member-photo mb-3">
                                               <img src="{{ asset('assets/customer/images/01.png') }}" >
                                            </div>
                                            <!-- NAME -->
                                            <h5 class="fw-bold">{{ $user->name }}</h5>
                                            <!-- PROFESSION -->
                                            <p class="text-muted mb-1">{{ $user->profession ?? 'Not Available' }}</p>
                                            <!-- OPTIONAL CONNECTION INFO -->
                                           <p class="text-muted small">Connected {{ $user->created_at->diffForHumans() }}</p>
                                            <div class="d-flex gap-2 mt-3">
                                                <a href="#"
                                                    class="btn btn-outline-uni w-50">
                                                    View
                                                </a>

                                                @if(!$sentRequests->isEmpty() && $sentRequests->contains('receiver_id', $user->id))
                                                    <button class="btn btn-gradient w-50" disabled>Request Sent</button>
                                                @else    
                                                <a class="btn btn-gradient w-50" href="{{ route('customer.send.connection.request', $user->id) }}">
                                                  Request Contact
                                                </a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @else
                            <!-- NO MATCHED USERS -->
                            <div class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png" width="120"
                                    class="mb-3">
                                <h4 class="fw-bold">No Matching Connections Found</h4>
                                <p class="text-muted">Try updating your preferences to find better matches.</p>
                            </div>
                        @endif

                    </div>


                    <!-- SENT REQUESTS -->
                    <div class="tab-pane fade" id="sent">
                       @if($sentRequests && !$sentRequests->isEmpty())
                            <div class="row g-4 mt-3">
                                @foreach($sentRequests as $request)
                                    <div class="col-md-4">
                                        <div class="card card-uni p-3 text-center">
                                            <div class="member-photo mb-3">
                                                  <img src="{{ asset('assets/customer/images/01.png') }}" >
                                            </div>
                                            <h5 class="fw-bold">{{ $request->receiver->name }}</h5>
                                            <p class="text-muted small mb-3">Request sent on {{ $request->receiver->created_at->diffForHumans() }}</p>
                                            <button class="btn btn-outline-uni w-100">Cancel Request</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png" width="120"
                                    class="mb-3">
                                <h4 class="fw-bold">No Sent Requests</h4>
                                <p class="text-muted">You haven't sent any connection requests yet.</p>
                            </div>
                        @endif

                    </div>

                    <!-- RECEIVED REQUESTS -->
                    <div class="tab-pane fade" id="received">
                       @if($receivedRequests && !$receivedRequests->isEmpty())
                            <div class="row g-4 mt-3">
                                @foreach($receivedRequests as $re)
                                <div class="col-md-4">
                                    <div class="card card-uni p-3 text-center">
                                        <div class="member-photo mb-3">
                                            <img src="{{ asset('assets/customer/images/01.png') }}" >
                                        </div>
                                        <h5 class="fw-bold">{{ $re->sender->name }}</h5>
                                        <p class="text-muted small mb-3">"Would love to connect!"</p>

                                        <div class="d-flex gap-2">
                                            <button class="btn btn-gradient w-50">Accept</button>
                                            <button class="btn btn-outline-uni w-50">Decline</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png" width="120"
                                    class="mb-3">
                                <h4 class="fw-bold">No Received Requests</h4>
                                <p class="text-muted">You have no pending connection requests.</p>
                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
