<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>VABOL | L.T.D.A.</title>

    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="row  justify-content-center">
        <div class="col-md-4 p-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">
                        Acceso a la aplicacion
                    </h1>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{route('login')}}">
                        {{csrf_field() }}
                        <div class="form-group {{ $errors->has('email')? 'has-error': ''}}">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Ingresa tu email" value="{{old('email')}}">
                            {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error': ''}}">
                            <label for="password">Contraseña</label>
                            <input class="form-control" type="password" name="password" >
                            {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>