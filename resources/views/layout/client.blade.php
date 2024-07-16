<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    @include('blocks.head')
    @yield('css')

</head>

<body>
    <div class="wrapper">
        @include('blocks.sidebar')
        <div class="main-panel">
            @include('blocks.nav')
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>




        @include('blocks.footer')

</body>

@include('blocks.js')
@yield('js')

</html>
