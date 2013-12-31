<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name', 'title') )</title>
        <!-- Fav Icon -->
        {{-- <link href="{{ asset('dashboard/images/favicon.ico') }}" rel="shortcut icon"> --}}
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        @yield('styles')
        <!-- ==== End StyleSheets Links =====================================-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .page-padding {
                padding-top: 80px;
            }
            .login-card {
                padding: 40px;
                box-shadow: 0px 5px 26px #6f6f6f;
            }
            .form-group {
                    margin-bottom: 15px;
                }
            .form-control {
                    height: 45px;
                }
        </style>
    </head>
    <body>
        <div id="app">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        {{-- @include('partials._messages') --}}
                    </div>
                </div>
            </div>



            <div class="container page-padding">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="login-card">
                                <div class="img-wrap text-center">
                                        <img src="{{ asset('images/logo.png') }}" width="" class="img-responsive" style="display:inline-block">
                                </div>
                
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.login.submit') }}">
                                        @csrf
                
                                        <div class="form-group">
                                            <label for="email"> البريد الالكتروني </label>
                
                
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                
                                        </div>
                
                                        <div class="form-group">
                                            <label for="password"> كلمة المرور </label>
                
                
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                
                                        </div>
                
                                        <div class="form-group">
                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                                    <label class="form-check-label" for="remember">
                                                        تذكرني
                                                    </label>
                                                </div>
                
                                        </div>
                
                                        <div class="form-group">
                
                                                <button type="submit" class="uk-button uk-button-custom uk-button-large">
                                                    تسجيل الدخول
                                                </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        

        </div>
        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <!-- UIkit JS -->
        <script src="{{ asset('js/uikit.min.js') }}"></script>
        <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
