<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title') Admin Dashboard</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" href="{{ Storage::url(setting('site_favicon')) }}" type="image/x-icon"/>
    <script src="https://kit.fontawesome.com/b925fabb49.js" crossorigin="anonymous"></script>
    <link href="{{ asset('backend/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @yield('css')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('backend.layouts.header')
        @include('backend.layouts.ui_settings')
        <div class="app-main">
            @include('backend.layouts.left_sidebar')
            <div class="app-main__outer">
                @yield('backend-content')
                {{-- @include('backend.layouts.footer') --}}
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('backend/assets/scripts/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/scripts/sweetalert2.all.min.js') }}"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    {!! Toastr::message() !!}

<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
</script>
    
    @yield('js')
    @include('sweetalert::alert')
    
</body>

</html>