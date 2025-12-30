@extends('layouts.customer-dashboard')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
   <!-- TOP NAVBAR -->
   <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
      <h4 class="m-0 fw-bold text-uni">Connections</h4>
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
   <section class="pb-3">
      <div class="container text-center main-color-11">
         <ul class="nav nav-pills justify-content-left">
            <li class="nav-item">
               <a class="nav-link1 {{ request()->routeIs('customer.match.suggestions') ? 'active' : '' }}"
                  href="{{ route('customer.match.suggestions') }}">
               Match Suggestions
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link1 {{ request()->routeIs('customer.my.connections') ? 'active' : '' }}"
                  href="{{ route('customer.my.connections') }}">
               My Connections
               </a>
            </li>
            <li class="nav-item"> 
               <a class="nav-link1 {{ request()->routeIs('customer.sent.requests') ? 'active' : '' }}"
                  href="{{ route('customer.sent.requests') }}">
               Sent Requests
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link1 {{ request()->routeIs('customer.received.requests') ? 'active' : '' }}"
                  href="{{ route('customer.received.requests') }}">
               Received Requests
               </a>
            </li>
         </ul>
      </div>
   </section>
   <section class="pb-5">
      <div class="container">
         <!-- SENT REQUESTS -->
         <div class="tab-pane fade show active" id="all">
            @if($sentRequests && !$sentRequests->isEmpty())
            <div class="row g-4 mt-3">
               @foreach($sentRequests as $request)
               <div class="col-md-4">
                  <div class="card card-uni p-3 text-center">
                     <div class="member-photo mb-3">
                        @if($request->receiver->profile_image)
                        <img src="{{ asset('assets/customer/uploads/profile/' . $request->receiver->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                        @else
                        <img src="{{ asset('assets/customer/images/person-dummy.jpg') }}" alt="Profile Image" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                        @endif
                     </div>
                     <h5 class="fw-bold">{{ $request->receiver->name }}</h5>
                     <hp class="text-muted mb-1">
                     {{ $request->receiver->email }}</p>
                     <p class="text-muted small mb-3">Request sent on {{ $request->receiver->created_at->diffForHumans() }}</p>
                     <a href="{{ route('customer.cancel.connection.request', $request->id) }}" class="btn btn-outline-uni w-100">Cancel Request</a>
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
      </div>
   </section>
</div>
@endsection