<x-app-layout>
    <!-- MAIN CONTENT -->
<div class="main-content">

      <!-- TOP NAVBAR -->
    <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
        <h4 class="m-0 fw-bold text-uni"> Setting</h4>
        
        @can('is-customer')
            <x-customer-dashboard-nav-profile />
        @endcan

        @can('is-admin')
            <x-admin-dashboard-nav-profile />
        @endcan
        
    </nav>
    <section class="page-header text-center py-3">
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
        </div>
    </section>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
