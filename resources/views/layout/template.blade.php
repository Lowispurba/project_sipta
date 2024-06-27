<!DOCTYPE html>
<html lang="en">
{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ url("style.css") }}">
    <title>Sispta</title>


</head> --}}
{{-- <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Dashboard Templates">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="../../sini/img/favicon.svg" />
    <title>Bootstrap 5 Admin Dashboard Template - Accordion</title>
    <link rel="stylesheet" href="../../sini/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../sini/fonts/style.css">
    <link rel="stylesheet" href="../../sini/css/main.css">
    <script src="../../sini/js/jquery.min.js"></script>
    <script src="../../sini/js/bootstrap.bundle.min.js"></script>
    <script src="../../sini/js/moment.js"></script>
    <script src="../../sini/../hh/../../hh/vendor/slimscroll/slimscroll.min.js"></script>
    <script src="../../sini/../hh/vendor/slimscroll/custom-scrollbar.js"></script>
    <script src="../../sini/js/main.js"></script>
</head> --}}
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISPTA</title>
    <link href="../../hh/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../hh/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="../../hh/vendor/jquery/jquery.min.js"></script>
    <script src="../../hh/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../hh/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>


</head>
<body>
    @include('layout.navbar')
      <div class="container">
        @yield('main')
      </div>
    @include('layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
