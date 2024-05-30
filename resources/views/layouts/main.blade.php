<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('template/assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
    @yield('contents')


    <script src="{{ asset('template/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/date-picker.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/dashboard.js') }}"></script>
</body>

</html>
