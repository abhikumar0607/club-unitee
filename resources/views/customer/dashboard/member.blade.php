 @extends('layouts.customer-dashboard')
 @section('content')
     <!-- MAIN CONTENT -->
     <div class="main-content">
         <!-- TOP NAVBAR -->
         <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
             <h4 class="m-0 fw-bold text-uni">Browse Members</h4>
             <x-customer-dashboard-nav-profile /> 
         </nav>

         <!-- HEADER -->
         <section class="page-header text-center py-5">
             <div class="container">
                 <h1 class="page-title">Find Members</h1>
                 <p class="page-subtitle">Explore profiles and connect with inspiring women.</p>
             </div>
         </section>

         <!-- FILTERS SECTION -->
         <section class="py-4">
             <div class="container">

                 <div class="card card-uni p-4 mb-4">
                     <h5 class="fw-bold mb-3">Search & Filter</h5>

                     <div class="row g-3">

                         <div class="col-md-4">
                             <input type="text" class="form-control input-uni" placeholder="Search name, profession...">
                         </div>

                         <div class="col-md-3">
                             <select class="form-select input-uni">
                                 <option value="">Golf Skill Level</option>
                                 <option>Beginner</option>
                                 <option>Intermediate</option>
                                 <option>Advanced</option>
                             </select>
                         </div>

                         <div class="col-md-3">
                             <select class="form-select input-uni">
                                 <option value="">Availability</option>
                                 <option>Weekday Mornings</option>
                                 <option>Weekends</option>
                             </select>
                         </div>

                         <div class="col-md-2">
                             <button class="btn btn-gradient w-100 fw-semibold">Clear</button>
                         </div>

                     </div>
                 </div>

             </div>
         </section>

         <!-- MEMBERS GRID -->
         <section class="pb-5">
             <div class="container">

                 <div class="row g-4">

                     <!-- MEMBER CARD -->
                     <div class="col-md-4">
                         <div class="card card-uni p-4 text-center">
                             <div class="member-photo mb-3"></div>
                             <h5 class="fw-bold">Priya Sharma</h5>
                             <p class="text-muted mb-1">Program Manager</p>
                             <span class="badge bg-success-subtle text-success fw-semibold mb-2">Beginner</span>
                             <p class="text-muted small">"Excited to meet women in social good!"</p>

                             <a href="view-member.html" class="btn btn-gradient w-100 mt-2">View Profile</a>
                         </div>
                     </div>

                     <!-- MEMBER CARD -->
                     <div class="col-md-4">
                         <div class="card card-uni p-4 text-center">
                             <div class="member-photo mb-3"></div>
                             <h5 class="fw-bold">Maya Rodriguez</h5>
                             <p class="text-muted mb-1">Director of Development</p>
                             <span class="badge bg-primary-subtle text-primary fw-semibold mb-2">Intermediate</span>
                             <p class="text-muted small">"Love the outdoors and strategy."</p>

                             <a href="view-member.html" class="btn btn-gradient w-100 mt-2">View Profile</a>
                         </div>
                     </div>

                     <!-- MEMBER CARD -->
                     <div class="col-md-4">
                         <div class="card card-uni p-4 text-center">
                             <div class="member-photo mb-3"></div>
                             <h5 class="fw-bold">Zara Chen</h5>
                             <p class="text-muted mb-1">Founder, Climate Tech</p>
                             <span class="badge bg-warning-subtle text-warning fw-semibold mb-2">Beginner</span>
                             <p class="text-muted small">"Trying something new outside tech."</p>

                             <a href="view-member.html" class="btn btn-gradient w-100 mt-2">View Profile</a>
                         </div>
                     </div>

                 </div>

                 <!-- Pagination -->
                 <div class="d-flex justify-content-center mt-5">
                     <nav>
                         <ul class="pagination pagination-uni">
                             <li class="page-item"><a class="page-link" href="#">1</a></li>
                             <li class="page-item"><a class="page-link" href="#">2</a></li>
                             <li class="page-item"><a class="page-link" href="#">Next</a></li>
                         </ul>
                     </nav>
                 </div>

             </div>
         </section>

     </div>
 @endsection
