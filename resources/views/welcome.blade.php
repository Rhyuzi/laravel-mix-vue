<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Pandulogistics</title>

        <!-- Bootstrap -->
        <link href="{{asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{asset('/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
        <!-- FullCalendar -->
        <link href="{{asset('/vendors/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
        <link href="{{asset('/vendors/fullcalendar/dist/fullcalendar.print.css')}}" rel="stylesheet" media="print">


        <!-- Custom Theme Style -->
        <link href="{{asset('/build/css/custom.min.css')}}" rel="stylesheet">
        @vite(['resources/js/app.js'])
    </head>
    <body>
                <div id="app">
                    <app-component></app-component>
                </div>

    <!-- jQuery -->
    <script src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/vendors/nprogress/nprogress.js')}}"></script>
    <!-- FullCalendar -->
    <script src="{{asset('/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('/vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('/build/js/custom.min.js')}}"></script>
    </body>
</html>
