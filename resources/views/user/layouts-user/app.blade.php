<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Suara Anda')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-light-custom {
            background-color: #f8f9fa !important;
        }

        /* Agar sidebar tidak melebihi lebar layar */
        .sidebar {
            width: 250px;
        }

        /* Flex container untuk sidebar dan konten */
        .main-content {
            flex-grow: 1;
            padding-top: 20px; /* memberi jarak atas */
        }

        /* Agar konten utama memiliki margin kiri jika diperlukan */
        .container-fluid {
            padding-left: 0;
        }
    </style>
</head>
<body class="bg-light-custom">

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3">
            @include('user.layouts-user.sidebar') <!-- Menyertakan file sidebar.blade.php -->
        </div>

        <!-- Konten Utama -->
        <div class="main-content">
            <div class="container mt-5">
                @yield('content')  <!-- Konten utama halaman akan dimasukkan di sini -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
