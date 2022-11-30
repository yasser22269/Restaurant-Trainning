<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layout.head')

</head>
<body>
<!-- BEGIN #app -->
<div id="app" class="app">
    <!--preloader -->
    <div id="pre-loader">
        <img src=""{{ URL::asset('images/pre-loader/loader-01.svg')}}" alt="">
    </div>
    <!--Main content -->
    <!-- main-content -->
    <div class="content-wrapper">


        @yield('content')

        <!--=================================
     wrapper -->

        <!--=================================
footer -->

        @include('layout.footer')
    </div><!-- main content wrapper end-->
</div>
<!--footer -->
@include('layout.script')
</body>
</html>



