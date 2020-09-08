<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Registro | Alcaldia - Sincelejo</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('images/sucre.ico')}}" type="image/x-icon">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">   
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center font-bold col-teal">REGISTRO DE USUARIOS</h2>
                    </div>
                    <div class="body">

                        <form id="form_create" method="POST" action="{{ route('register.store') }}"
                            autocomplete="off">

                            @csrf   
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Nombres</label>
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name" required autofocus>
                                        </div>                                        
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">
                                    <label for="apellidos">Apellidos</label>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                           <input class="form-control" name="apellidos" required autofocus>   
                                        </div>
                                    </div>        
                                </div>

                                <div class="col-md-6">
                                    <label for="tipo_id">Tipo Empleado</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="tipo_id" class="form-control" required autofocus>
                                            <option value="">-- Escoja una opcion --</option>
                                            @foreach($tipos as $tipo)
                                               <option value="{{$tipo->id}}">{{$tipo->nombre_tipo}}</option>
                                            @endforeach 
                                            </select>                                                 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="dependencia_id">Dependencia</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="dependencia_id" class="form-control" required autofocus>
                                            <option value="">-- Escoja una opcion --</option>   
                                            @foreach($dependencias as $dependencia)
                                              <option value="{{$dependencia->id}}">{{$dependencia->nombre_dependencia}}</option>
                                            @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                            <input class="form-control" name="email" required autofocus>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>        
                                </div>

                                <div class="col-md-6">
                                    <label for="password">Contraseña</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password" required>
                                            
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>        
                                </div>

                                <div class="col-md-6">
                                    <label for="password_confirmation">Confirma Contraseña</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>        
                                </div>

                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <button class="btn btn-block bg-blue-grey waves-effect" type="submit">
                                        <a class="btn btn-block bg-blue-grey waves-effect">Registrarse</a>
                                        </button>
                                    </div>
                                    <div class="col-md-6 text-center pull-right">
                                        <button class="btn btn-block bg-deep-orange waves-effect">
                                        <a class="btn btn-block bg-deep-orange waves-effect" href="{{ url('/login') }}">Cancelar</a>
                                        </button>
                                    </div>
                                </div>    
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>       
    </div>

    <!-- Jquery Core Js -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>

    <!-- Sweetalert  -->
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('pages/examples/sign-up.js')}}"></script>
    
</body>


