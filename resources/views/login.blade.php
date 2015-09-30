<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Iniciar Sesión - SiCoRe</title>
{!! HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
{!! HTML::style('bower_components/metisMenu/dist/metisMenu.min.css') !!}
{!! HTML::style('dist/css/sb-admin-2.css') !!}
{!! HTML::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Iniciar Sesión</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'login', 'role' => 'form']) !!}
                        <fieldset>
                            <div class="form-group">
                                {!! Form::text('usuario', '', ['placeholder' => 'Usuario', 'class' => 'form-control', 'required', 'autofocus', 'autocomplete' => 'off']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('contrasena', ['placeholder' => 'Contraseña', 'class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
                            </div>
                            {!! Form::submit('Ingresar', ['class' => 'btn btn-lg btn-danger btn-block']) !!}
                        </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

{!! HTML::script('bower_components/jquery/dist/jquery.min.js') !!}
{!! HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
{!! HTML::script('bower_components/metisMenu/dist/metisMenu.min.js') !!}
{!! HTML::script('dist/js/sb-admin-2.js') !!}

</body>
</html>