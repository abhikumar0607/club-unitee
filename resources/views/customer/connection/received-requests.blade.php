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
   <section class="pb-3">
        <x-connection-tab />
   </section>
   <section class="pb-5">
      <div class="container">
         <!-- RECEIVED REQUESTS -->
         <div class="tab-pane fade show active" id="all">
            @if($receivedRequests && !$receivedRequests->isEmpty())
            <div class="row g-4 mt-3">
               @foreach($receivedRequests as $re)
               <div class="col-md-4">
                  <div class="card card-uni p-3 text-center">
                     <div class="member-photo mb-3">
                        @if($re->sender->profile_image)
                        <img src="{{ asset('assets/customer/uploads/profile/' . $re->sender->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                        @else
                        <img src="{{ asset('assets/customer/images/person-dummy.jpg') }}" alt="Profile Image" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                        @endif
                     </div>
                     <h5 class="fw-bold">{{ $re->sender->name }}</h5>
                     <hp class="text-muted mb-1">
                     {{ $re->sender->email }}</p>
                     <p class="text-muted small mb-3">"Would love to connect!"</p>
                     <div class="d-flex gap-2">
                        <a href="{{ route('customer.accept.connection.request', $re->id) }}" class="btn btn-gradient w-50">Accept</a>
                        <a href="{{ route('customer.cancel.connection.request', $re->id) }}" class="btn btn-outline-uni w-50">Decline</a>
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
   </section>
</div>
@endsection