<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/pages/auth.css') }}">
    <link rel="icon" href="{{ asset('LandingPage/assets/images/icon-duittracker.svg') }}" type="icon-duittracker">
    <link rel="stylesheet" href="{{ asset('template/assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Tambahkan SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Tambahkan SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body>
    @yield('contents')
    <script src="{{ asset('template/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/date-picker.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/parsley.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Need: Apexcharts -->
    <script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Date Format Indonesia --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(".flatpickr-no-config", {
                dateFormat: "j M Y",
                altFormat: "j M Y",
            });

            flatpickr(".flatpickr-range", {
                mode: "range",
                dateFormat: "j M Y",
                altFormat: "j M Y",
            });
        });
    </script>
</body>

</html>
