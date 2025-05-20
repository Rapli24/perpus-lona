<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Politeknik Negeri Medan | @yield('title')</title>

    <!-- HANYA Bootstrap 5 (hindari duplikat versi) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .main-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container my-4 main-container">
        <div class="alert alert-info text-center">   
            <h4 class="mb-0"><b>Selamat datang</b> di Perpustakaan POLMED</h4>     
        </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-3">
                @include('sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                @include('menu')
                @include('banner')
                @include('konten')
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-4">
            @include('footer')
        </div>
    </div>
</body>
</html>
