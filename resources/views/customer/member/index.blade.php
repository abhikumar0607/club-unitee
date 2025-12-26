 @extends('layouts.customer-dashboard')
 @section('content')
     <!-- MAIN CONTENT -->
     <div class="main-content">
         <!-- TOP NAVBAR -->
         <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
             <h4 class="m-0 fw-bold text-uni">Members</h4>
             <x-customer-dashboard-nav-profile />
         </nav>

         <!-- HEADER -->
         <section class="page-header text-center py-3">
             <div class="container">
                 <h1 class="page-title">Find Members</h1>
                 <p class="page-subtitle">Explore profiles and connect with inspiring women.</p>
             </div>
         </section>

         <!-- FILTERS SECTION -->
         <section class="pb-4">
             <div class="container">

                 <div class="card card-uni p-4 mb-4">
                     <h5 class="fw-bold mb-3">Search & Filter</h5>

                     <!-- FILTERS -->
                     <form action="{{ route('customer.members') }}" method="GET">
                         <div class="row g-3">

                             <!-- SEARCH -->
                             <div class="col-md-4">
                                 <input type="text" name="search" class="form-control input-uni"
                                     placeholder="Search name, profession..." value="{{ request('search') }}">
                             </div>

                             <!-- GOLF SKILL LEVEL -->
                             <div class="col-md-3">
                                 <select name="golf_skill_level" class="form-select input-uni">
                                     <option value="">Golf Skill Level</option>
                                     <option value="Beginner"
                                         {{ request('golf_skill_level') == 'Beginner' ? 'selected' : '' }}>
                                         Beginner
                                     </option>
                                     <option value="Intermediate"
                                         {{ request('golf_skill_level') == 'Intermediate' ? 'selected' : '' }}>
                                         Intermediate
                                     </option>
                                     <option value="Advanced"
                                         {{ request('golf_skill_level') == 'Advanced' ? 'selected' : '' }}>
                                         Advanced
                                     </option>
                                 </select>
                             </div>

                             <!-- AVAILABILITY -->
                             <div class="col-md-3">
                                 <select name="availability" class="form-select input-uni">
                                     <option value="">Availability</option>
                                     <option value="Weekday Mornings"
                                         {{ request('availability') == 'Weekday Mornings' ? 'selected' : '' }}>
                                         Weekday Mornings
                                     </option>
                                     <option value="Weekday Afternoons"
                                         {{ request('availability') == 'Weekday Afternoons' ? 'selected' : '' }}>
                                         Weekday Afternoons
                                     </option>
                                     <option value="Weekends" {{ request('availability') == 'Weekends' ? 'selected' : '' }}>
                                         Weekends
                                     </option>
                                     <option value="No Preference" {{ request('availability') == 'No Preference' ? 'selected' : '' }}>
                                         No Preference
                                     </option>
                                 </select>
                             </div>

                             <!-- SUBMIT -->
                             <div class="col-md-2">
                                 <button type="submit" class="btn btn-gradient w-100 fw-semibold">
                                     Apply
                                 </button>
                             </div>

                         </div>
                     </form>

                 </div>

             </div>
         </section>

         <!-- MEMBERS GRID -->
         <section class="pb-5">
             <div class="container">

                 <div class="row g-4">
                     @if ($members->count() > 0)
                         @foreach ($members as $member)
                             <!-- MEMBER CARD -->
                             <div class="col-md-4">
                                 <div class="card card-uni p-4 text-center">
                                    <!-- PROFILE PHOTO -->
                                    <div class="member-photo mb-3">
                                        @if($member->profile_image)
                                            <img src="{{ asset('assets/customer/uploads/profile/' . $member->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                                        @else
                                            <img src="{{ asset('assets/customer/images/person-dummy.jpg') }}" alt="Profile Image" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                                        @endif
                                    </div>
                                     <h5 class="fw-bold">{{ $member->name }}</h5>
                                     <p class="text-muted mb-1">{{ $member->profession }}</p>
                                     <span
                                    class="badge bg-success-subtle text-success fw-semibold mb-2">{{ $member->email }}</span>
                                     <!-- <p class="text-muted small">"{{ $member->linkedin_url ??'' }}"</p><br>
                                     <p class="text-muted small">"{{ $member->instagram_handle ?? '' }}"</p> -->
                                     <a href="{{ route('profile.index', $member->id) }}" class="btn btn-gradient w-100 mt-2">View Profile</a>
                                 </div>
                             </div>
                         @endforeach
                     @else
                         <p>No members found.</p>
                     @endif
                 </div>

                 <!-- Pagination -->
                 <div class="d-flex justify-content-center mt-5">
                        {{ $members->links('pagination::bootstrap-5') }}
                 </div>

             </div>
         </section>

     </div>
 @endsection
