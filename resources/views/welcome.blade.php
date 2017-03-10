<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>D`Stroke Tennis</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        

    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: Raleway, sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-top: 120px;
                margin-bottom: 30px;
                color: #840000;
            }
        </style>
</head>
<body>
    
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          <a class="navbar-brand" href="{{route('home')}}">
                <image src="{{ URL::asset('img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo" style="height:40px;" ></image>
            </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav nav-pills nav-justified">
          
          @if (Route::has('login'))
            @if (Auth::check())
                <li role="presentation"><a href="{{ url('/home') }}"><span style="color: #840000; font-weight: bold;">Home</span></a></li>
                <li role="presentation"><a href="#"><span style="color: #840000; font-weight: bold;">Blog</span></a></li>
                <li role="presentation"><a href="{{ url('/packages') }}"><span style="color: #840000; font-weight: bold;">Lesson Packages</span></a></li>
                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> <span style="color: #840000; font-weight: bold;">Logout</span></a></li>
            @else
                <li role="presentation"><a href="#"><span style="color: #840000; font-weight: bold;">Blog</span></a></li>
                <li role="presentation"><a href="{{ url('/packages') }}"><span style="color: #840000; font-weight: bold;">Lesson Packages</span></a></li>
                <li role="presentation"><a href="{{ url('/login') }}"><span style="color: #840000; font-weight: bold;">Login</span></a></li>
                <li role="presentation"><a href="{{ url('/register') }}"><span style="color: #840000; font-weight: bold;">Register</span></a></li>
            @endif
           @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <div class="row">
            <div class="col-12-md">
                
                <div class="flex-center full-height">
                       
                        <div class="content">
                        <div class="title m-b-md">
                            Welcome to D`Stroke Tennis
                        </div>
                        <div class="flex-center">
                            <image class="img-rounded img-responsive center-block" src="{{ URL::asset('/img/OnDCourtFade.png') }}" alt="D`Stroke"/> 
                        </div>
                    </div>
                     
                </div>
               
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>




     





