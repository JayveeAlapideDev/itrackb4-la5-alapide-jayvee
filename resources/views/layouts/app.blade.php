<!DOCTYPE html>
<html>
    <head>
        <title>
           @yield('title')
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-dark-grey">
        <div class="container py-4">
            <h1>Products Records Sales </h1>

         @include('partials._nav')
         @yield('content')
        </div>
        
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
