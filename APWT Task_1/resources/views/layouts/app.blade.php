<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="conatiner">
        <h1>Welcome to the Shop</h1>
        @include('includes.topnav')
    </div>
    <div>
        @yield('content')
    </div>
    <div>
        <h3>Contact us</h3>
    </div>
</body>

</html>
