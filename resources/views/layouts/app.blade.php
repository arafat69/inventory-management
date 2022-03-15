@include('layouts.header')

<div class="main-content container-fluid">
    {{-- <div class="page-title">
        <h6>Dashboard</h6>
    </div> --}}

    @yield('content')

</div>
@include('layouts.footer')
