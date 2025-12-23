@extends('layouts.admin-dashboard')
@section('content')

<!-- MAIN CONTENT -->
<div class="main-content">

    <nav class="top-navbar d-flex justify-content-end align-items-center px-4 shadow-sm">
        <x-admin-dashboard-nav-profile />
    </nav>

    <!-- HEADER -->
    <section class="page-header text-center py-4">
        <div class="container">
            <h1 class="page-title">Admin Dashboard</h1>
            <p class="page-subtitle">Manage members, events, and applications.</p>
        </div>
    </section>

    <!-- ================== DASHBOARD CARDS ================== -->
    <section class="pb-5">
        <div class="container">

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="card card-uni p-4 text-center">
                        <h3 class="fw-bold stat-number">{{ $allApplications }}</h3>
                        <p class="stat-label">Total Members</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-uni p-4 text-center">
                        <h3 class="fw-bold stat-number">{{ $pendingApplications }}</h3>
                        <p class="stat-label">Pending Applications</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-uni p-4 text-center">
                        <h3 class="fw-bold stat-number">{{ $allEvents }}</h3>
                        <p class="stat-label">Total Events</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-uni p-4 text-center">
                        <h3 class="fw-bold stat-number">{{ $currentMonth }}</h3>
                        <p class="stat-label">New Members (This Month)</p>
                    </div>
                </div>

            </div>

            <!-- QUICK ACTIONS -->
            <!-- <h3 class="section-title-uni mt-5">Quick Actions</h3>

                <div class="d-flex flex-wrap gap-3 mt-3">
                    <a href="admin-applications.html" class="btn btn-gradient px-4">Review Applications</a>
                    <a href="admin-events-create.html" class="btn btn-gradient px-4">Create Event</a>
                    <a href="admin-members.html" class="btn btn-gradient px-4">Manage Members</a>
                </div> -->


            <!-- ================== DASHBOARD GRAPHS ================== -->
            <div class="row g-4 mt-5">

                <!-- Total Members -->
                <div class="col-md-6">
                    <div class="card card-uni p-4">
                        <h6 class="fw-bold mb-3">Total Members</h6>
                        <canvas id="totalMembersChart" style="height:250px;width:100%"></canvas>
                    </div>
                </div>

                <!-- Total Events -->
                <div class="col-md-6">
                    <div class="card card-uni p-4">
                        <h6 class="fw-bold mb-3">Total Events</h6>
                        <canvas id="totalEventsChart" style="height:250px;width:100%"></canvas>
                    </div>
                </div>

            </div>


            <!-- RECENT ACTIVITY -->
            <!-- <h3 class="section-title-uni mt-5">Recent Activity</h3>

            <div class="card card-uni p-4 mt-3">

                <div class="activity-item mb-3">
                    <p class="fw-semibold mb-1">New Application Submitted</p>
                    <p class="text-muted small">Priya Sharma applied 2 hours ago</p>
                </div>

                <div class="activity-item mb-3">
                    <p class="fw-semibold mb-1">Event Created</p>
                    <p class="text-muted small">“Coffee & Connections” added by Admin</p>
                </div>

                <div>
                    <p class="fw-semibold mb-1">New Member Joined</p>
                    <p class="text-muted small">Zara Chen joined yesterday</p>
                </div>

            </div> -->

            <!-- UPCOMING EVENTS -->
            <h3 class="section-title-uni mt-5">Upcoming Events</h3>

            <div class="row g-4 mt-1">
            @forelse($upcomingEvents as $event)
            <div class="col-md-4">
                <div class="card card-uni p-3">
                    @if($event->image)
                        <img src="{{ asset('assets/admin/uploads/events/' . $event->image) }}"
                            class="event-img-sm mb-3"
                            alt="{{ $event->title }}">
                    @else
                        <div class="event-img-sm mb-3 d-flex align-items-center justify-content-center no-image">
                            No Image Found
                        </div>
                    @endif
                    <h5 class="fw-bold">{{ $event->title }}</h5>
                    @php
                        $eventDate = \Carbon\Carbon::parse($event->date);
                        $daysDiff = now()->diffInDays($eventDate);
                    @endphp
                    <p class="text-muted small mb-1">
                        @if($daysDiff <= 7)
                            {{ $eventDate->format('l') }} •
                            {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}
                        @else
                            @if($daysDiff < 28)
                                {{ ceil($daysDiff / 7) }} week{{ ceil($daysDiff / 7) > 1 ? 's' : '' }} later
                            @else
                                {{ ceil($daysDiff / 30) }} month{{ ceil($daysDiff / 30) > 1 ? 's' : '' }} later
                            @endif
                        @endif
                    </p>
                    <a href="event-details.html" class="btn btn-outline-uni w-100 mt-2">View Details</a>
                </div>
            </div>
                @empty
            <div class="col-12">
                <p class="text-muted">No upcoming events</p>
            </div>
            @endforelse
            </div>
            {{--Pagination --}}
            <div class="mt-3">
                {{ $upcomingEvents->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const membersData = @json($membersData);
    const eventsData  = @json($eventsData);
    // Total Members (BAR chart – GREEN, Jan to Dec)
    new Chart(document.getElementById('totalMembersChart'), {
        type: 'bar',
        data: {
            labels: [
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Dec'
            ],
            datasets: [{
                data: membersData,
                backgroundColor: '#1f7a5c',
                borderRadius: 6
            }]
        },
        options: {
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Total Events (LINE chart – GREEN)
    new Chart(document.getElementById('totalEventsChart'), {
        type: 'line',
        data: {
            labels: [
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Dec'
            ],
            datasets: [{
                  data: eventsData,
                borderColor: '#1f7a5c',        // green line
                backgroundColor: 'rgba(31, 122, 92, 0.15)', // light green fill
                borderWidth: 2,
                tension: 0.4,                 // smooth curve
                fill: true,
                pointBackgroundColor: '#1f7a5c',
                pointRadius: 4
            }]
        },
        options: {
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 2
                    }
                }
            }
        }
    });
</script>
@endsection