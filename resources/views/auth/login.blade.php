<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Inicia Session | Alcaldia - Sincelejo</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('images/sucre.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.min.css')}}" rel="stylesheet" />
    
    <!-- Custom Css -->
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet">
</head>

<body class="login-page">
    
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"> <b>Iniciar Sesion</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="form_validation" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line{{ $errors->has('email') ? 'error' : '' }}">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu usuario" value="{{ old('cedula') }}" required autofocus
                            style="background-color:transparent">
                            @if ($errors->has('email'))
                            <label id="email-error" class="error" for="email">
                                {{$errors->first('email')}}
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line{{ $errors->has('password') ? 'error' : '' }}">
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" required style="background-color:transparent"
                            >
                            @if ($errors->has('password'))
                            <label id="password-error" class="error" for="password">
                                {{$errors->first('password')}}
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 text-center">
                            <button class="btn btn-block bg-blue-grey waves-effect" type="submit">
                               <a class="btn btn-block bg-blue-grey waves-effect">INGRESAR</a>
                            </button>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-block bg-light-green waves-effect">
                              <a class="btn btn-block bg-light-green waves-effect" href="{{ url('/register') }}">REGISTRARSE</a>
                            </button>
                        </div>
                    </div>
        
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.min.js')}}"></script>
 
</body>

</html>