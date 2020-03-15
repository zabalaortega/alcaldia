<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Inicio Session | Plataforma - Alcaldia</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    
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
            <a href="javascript:void(0);">Plataforma<b>Alcaldia</b></a>
            <small>sistemas</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="form_validation" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">Inicia sesión para ingresar</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line{{ $errors->has('email') ? 'error' : '' }}">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu usuario" value="{{ old('cedula') }}" required autofocus>
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
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                            @if ($errors->has('password'))
                            <label id="password-error" class="error" for="password">
                                {{$errors->first('password')}}
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 text-center">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">INGRESAR</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 pull-right">
                            <a href="{{ url('/register') }}">Registrarse</a>
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