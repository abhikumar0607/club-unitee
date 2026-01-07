 @extends('layouts.customer-frontend')

 @section('content')
 <!-- EVENT DETAILS -->
 <section class="py-5 main-event-detail">
     <div class="container">

         <div class="card card-uni p-4">

             <!-- EVENT IMAGE -->
             <div class="event-img-large mb-4">

                 <div class="going-ribbon-01">
                     You're Going
                 </div>


                 @if ($all_events->image)
                 <img src="{{ asset('assets/admin/uploads/events/' . $all_events->image) }}" class="event-img-sm mb-3"
                     alt="{{ $all_events->title }}">
                 @else
                 <div class="event-img-sm mb-3 d-flex align-items-center justify-content-center no-image">
                     No Image Found
                 </div>
                 @endif
             </div>

             <!-- TITLE & META -->
             <h2 class="fw-bold mb-1">{{ $all_events->title }}</h2>
             <p class="text-muted mb-1">
                 @php
                 $eventDate = \Carbon\Carbon::parse($all_events->date);
                 $daysDiff = now()->diffInDays($eventDate);
                 @endphp

                 @if ($daysDiff <= 7) {{ $eventDate->format('l') }} •
                     {{ \Carbon\Carbon::parse($all_events->event_time)->format('h:i A') }} @else @if ($daysDiff < 28)
                     {{ ceil($daysDiff / 7) }} week{{ ceil($daysDiff / 7) > 1 ? 's' : '' }} later @else
                     {{ ceil($daysDiff / 30) }} month{{ ceil($daysDiff / 30) > 1 ? 's' : '' }} later @endif @endif </p>
                     <!-- <p class="text-muted mb-3">Torrey Pines Golf Course</p> -->

                     <span class="badge bg-success-subtle text-success fw-semibold mb-4">{{ $all_events->type }}</span>

                     <hr>

                     <!-- DESCRIPTION -->
                     <h4 class="fw-bold section-title-uni mt-4 mb-3">About This Event</h4>
                     <p class="text-muted">
                         {!! $all_events->description !!}
                     </p>

                     <!-- DETAILS GRID -->
                     <div class="row g-4 mt-3">

                         <div class="col-md-4">
                             <p class="small text-muted fw-semibold mb-1">Date</p>
                             <p class="text-muted">{{ \Carbon\Carbon::parse($all_events->date)->format('l, F d') }}</p>
                         </div>

                         <div class="col-md-4">
                             <p class="small text-muted fw-semibold mb-1">Time</p>
                             <p class="text-muted">{{ \Carbon\Carbon::parse($all_events->event_time)->format('g:i A') }}
                             </p>
                         </div>

                         <div class="col-md-4">
                             <p class="small text-muted fw-semibold mb-1">Location</p>
                             <p class="text-muted">{{ $all_events->location }}</p>
                         </div>

                         <!-- <div class="col-md-4">
                <p class="small text-muted fw-semibold mb-1">Skill Level</p>
                <p class="text-muted">Beginner</p>
              </div>

              <div class="col-md-4">
                <p class="small text-muted fw-semibold mb-1">Event Type</p>
                <p class="text-muted">Golf Outing</p>
              </div>

              <div class="col-md-4">
                <p class="small text-muted fw-semibold mb-1">Capacity</p>
                <p class="text-muted">12 / 20 spots filled</p>
              </div> -->

                     </div>

                     <!-- <hr class="mt-4 mb-4"> -->

                     <!-- RSVP BUTTONS -->
                     <div class="d-flex gap-3">

                         @auth
                         @php
                         $isAdmin = auth()->user()->role === 'admin';
                         $userRsvp = $all_events->rsvps->where('user_id', auth()->id())->first();
                         @endphp

                         @if ($isAdmin)
                         <a href="{{ url('admin/events/rsvp/' . $event->id) }}"
                             class="btn btn-gradient text-decoration-none">
                             <strong>{{ $all_events->rsvps->count() }}</strong> RSVP’s
                         </a>
                         @else
                         @if ($userRsvp)
                         <button class="btn btn-success btn-sm btn-gradient"
                             onclick="openRsvpModal('{{ $all_events->title }}', {{ $all_events->id }}, 'cancel')">
                             Cancel
                         </button>
                         @else
                         <button class="btn btn-gradient"
                             onclick="openRsvpModal('{{ $all_events->title }}', {{ $all_events->id }}, 'confirm')">RSVP
                         </button>
                         @endif
                         @endif
                         @else
                         <a href="{{ route('login') }}" class="btn btn-gradient">RSVP</a>
                         @endauth

                     </div>

                     <!-- Add to Calendar -->
                     <!-- <div class="mt-4">
              <a href="#" class="btn btn-outline-uni px-4">Add to Calendar</a>
            </div>

            <hr class="mt-4"> -->

                     <!-- ATTENDEES -->
                     <!-- <h4 class="fw-bold section-title-uni mt-3 mb-3">Attending Members</h4>

            <div class="d-flex flex-wrap gap-4"> -->

                     <!-- Profile Circle -->
                     <!-- <div class="attendee"></div>
              <div class="attendee"></div>
              <div class="attendee"></div>
              <div class="attendee"></div>

            </div> -->

         </div>

     </div>
 </section>
 <!--RSVP Modal-->
 <x-rsvp-event-modal />
 @endsection