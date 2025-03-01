<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard</title>
    <!-- CSS files -->
    <link href="{{asset("admin/assets/dist/css/tabler.min.css?1692870487")}}" rel="stylesheet"/>
    {{--    <link href="{{asset("admin/assets/dist/css/tabler-flags.min.css?1692870487")}}" rel="stylesheet"/>--}}
    {{--    <link href="{{asset("admin/assets/dist/css/tabler-payments.min.css?1692870487")}}" rel="stylesheet"/>--}}
    {{--    <link href="{{asset("admin/assets/dist/css/tabler-vendors.min.css?1692870487")}}" rel="stylesheet"/>--}}
    <link href="{{asset("admin/assets/dist/css/demo.min.css?1692870487")}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('default-files/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">



    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body>
<script src="{{asset('admin/assets/dist/js/demo-theme.min.js?1692870487')}}"></script>
<div class="page">
    <!-- Sidebar -->
    @include('admin.include.sidebar')
    <!-- Navbar -->
    @include('admin.include.header')
    <div class="page-wrapper">
        <!-- Main Contents -->
        @yield('content')
        <!-- Footer -->
        @include('admin.include.footer')
    </div>
</div>
<!-- Models -->

<!-- Libs JS -->
{{--<script src="{{asset("admin/assets/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487")}}" defer></script>--}}
{{--<script src="{{asset("admin/assets/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487")}}" defer></script>--}}
{{--<script src={{asset("admin/assets/dist/libs/jsvectormap/dist/maps/world.js?1692870487")}} defer></script>--}}
{{--<script src="{{asset("admin/assets/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487")}}" defer></script>--}}
<!-- Tabler Core -->
<script src="{{asset("admin/assets/dist/js/tabler.min.js?1692870487")}}" defer></script>
<script src="{{asset("admin/assets/dist/js/demo.min.js?1692870487")}}" defer></script>
</body>
</html>
