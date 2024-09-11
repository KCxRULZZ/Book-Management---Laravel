<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navigation Bar -->
    <div class="d-flex justify-content-between align-items-center py-3 px-3">
        <!-- Book Management (Left-aligned) -->
        <a class="fw-bold fs-2 navbar-brand" href="{{ url('/books') }}">Book Management</a>

        <!-- Logout Button (Right-aligned) -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a class="btn btn-outline-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
        </a>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Bootstrap Script -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
