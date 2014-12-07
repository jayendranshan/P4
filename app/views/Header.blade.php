<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'JayVey')</title>

    <meta charset='utf-8'>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('Styles/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <link href="{{ URL::asset('Styles/jumbotron-narrow.min.css') }}" rel="stylesheet">

    <!-- custom CSS -->
    <link href="{{ URL::asset('Styles/style.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <font size="5" color="white">JayVey</font>  
            </div>

        <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/"> <span class="glyphicon glyphicon-home"></span> Go to Home Page </a></li>
              </ul>
            </div>
            
        </div>
    </div>
    <br><br><br>
    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif
    @yield('content')

</body>
</html>