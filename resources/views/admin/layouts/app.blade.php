<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name', 'title') )</title>
        <!-- Fav Icon -->
        <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
        @yield('styles')
        <!-- ==== End StyleSheets Links =====================================-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="app">


            @include('admin.partials._header')

            
            <div class="container-fluid page-padding">
                <div class="row">
                    <div class="col-xs-2">
                        @include('admin.partials._sidebar')
                    </div>
                    <div class="col-md-10">
                        @include('admin.partials._messages')
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('admin.partials._footer')
        </div>
        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <!-- UIkit JS -->
        <script src="{{ asset('js/uikit.min.js') }}"></script>
        <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @yield('scripts')
        
    </body>
</html>
