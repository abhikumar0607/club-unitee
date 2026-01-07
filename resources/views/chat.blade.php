@extends(auth()->user()->role === 'customer'
? 'layouts.customer-dashboard'
: 'layouts.admin-dashboard'
)

@section('content')

@endsection