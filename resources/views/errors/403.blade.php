<!DOCTYPE html>
<html>
    <head>
        <title>Restricted view.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #840000;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: top;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">
                    <h4>Restricted view area.</h4>
                    <a class="navbar-brand" href="{{ url('/home') }}"><image src="{{ URL::asset('img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo" height="42px"></image><span style="color:#84000; font-size:14px; ">Home</span></a>
                    <h5>You are not authorized to view this page. This is for site administrators only.</h5>
                </div>
            </div>
        </div>
    </body>
</html