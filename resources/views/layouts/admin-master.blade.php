<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
        <link rel="stylesheet" href="{{ URL::secure('css/main.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::secure('css/common.css') }}" type="text/css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="shortcut icon" href="{{ asset('favicon-32x32.png') }}" >
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
          $( function() {
            $( "#datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "m/d/yy"
            });
          } );
        </script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    
        @yield('styles')
    </head>
    <body>
        
        @include('includes.admin-header')
        @yield('content')
        
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="https://raw.githubusercontent.com/moment/moment/develop/min/moment-with-locales.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>
        <script src=""></script>
        @yield('scripts')
        
     
    </body>
</html>