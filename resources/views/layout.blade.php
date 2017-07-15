<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
   <!-- <link href="/js/app.js" rel="script">

    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script> -->


</head>

<body>
    @include('layouts.nav')

    @if ($flash = session('message'))

        <p>this is a test</p>

        <div id="flash-message" class="alert alert-success" role="alert">
            {{ $flash }}
        </div>

        <script>


            window.setTimeout(function() {
                $("#flash-message").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 3000);

            console.log("#flash-message");
        </script>

    @endif

    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">The Bootstrap Blog</h1>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
        </div>
    </div>

    <div class="container">

        <div class="row">
            @yield('content')

            @include('layouts.sidebar')

        </div>

    </div><!-- /.container -->


<!--

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
-->


</body>
@include('layouts.footer')
</html>
