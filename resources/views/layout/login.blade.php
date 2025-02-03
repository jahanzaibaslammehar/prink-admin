@extends('../layout/base')

@section('body')

<body class="login">
    @yield('content')

    <!-- BEGIN: JS Assets-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->

    @yield('script')
</body>
@endsection