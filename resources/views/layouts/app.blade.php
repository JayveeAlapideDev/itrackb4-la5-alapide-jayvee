<!DOCTYPE html>
<html>
    <head>
        <title>
           @yield('title')
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-black">
        <div class="container">
            <header class="bg-white">
                <h1 class="container text-center">TINDAHAN NI INDAY</h1>
            </header>
          
         @include('partials._nav')
         @yield('content')
        </div>
        
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
