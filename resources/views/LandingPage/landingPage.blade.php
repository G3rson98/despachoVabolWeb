<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VABOL</title>

    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .wrapper{
            max-height: 300px;
            border: 1px solid #ddd;
            display: flex;
            overflow-x: auto;
        }
        /* .wrapper::-webkit-scrollbar{
            width: 0;
        } */
        .wrapper .itemx{
            min-width: 250px;
            height: auto;
            line-height: auto;
            margin-right: 4px;
        }
        body{
            background-color: #F4F4F4;
        }
        .formContacto{
            margin-left: 150px;
            margin-right: 150px;
        }
    </style>
</head>
<body>
   {{-- NavbarBegin --}}
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top" style="height: 90px">
            <div class="container-fluid">
                <a class="navbar-brand">VABOL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="{{ url('/LoginForm') }}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ url('/anuncio') }}" class="nav-link">About us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
   {{-- NavbarEnds --}}
    {{-- CONTENT BEGIN --}}
        

    <div class="container" style="margin-top: 50px; margin-bottom: 50px">
        
        {{-- formContacto --}}
        <div class="formContacto">
            {{-- errores --}}
            @if (count($errors)>0)
               <div class="alert alert-default-danger" role="alert">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li> {{ $error }} </li>
                   @endforeach
               </ul>
               </div>
            @endif
            {{-- errores --}}
            <!-- /.card -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Contáctanos</h3>
                </div>
             <form action="{{ url('/solicitudcontacto/store') }}" role="form" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                {{-- FirstRow --}}
                  <div class="row">
                    <div class="col-6 form-group">
                      <label for="sol_nombre">Nombre:</label>
                      <input type="text" name="sol_nombre" class="form-control" placeholder="Ingresar nombre">
                    </div>
                    <div class="col-6 form-group">
                        <label for="sol_apellido">Apellidos:</label>
                      <input type="text" name="sol_apellido" class="form-control" placeholder="Ingresar apellidos">
                    </div>
                  </div>
                  {{-- SecondRow --}}
                  <div class="row">
                    <div class="col-6 form-group">
                        <label for="sol_celular">Celular:</label> 
                      <input type="text" name="sol_celular" class="form-control" placeholder="Ingresar celular">
                    </div>
                    <div class="col-6 form-group">
                        <label for="sol_email">Email:</label>
                      <input type="email" name="sol_email" class="form-control" placeholder="Ingresar email">
                    </div>
                  </div>
                  {{-- ThirdRow --}}
                  <div class="row">
                    <div class="col-12 form-group">
                        <label for="sol_contenido">Asunto:</label>
                      <textarea class="form-control" name="sol_contenido" rows="3" placeholder="Cuentanos..."></textarea>
                    </div>
                  </div>
                </div>
                {{-- FormFooter --}}
                <div class="card-footer text-center">
                    {{-- <span class="col-1"></span> --}}
                    <button type="submit" class="btn btn-primary col-4">Enviar</button>
                </div>
                </form>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
        {{-- forContacto --}}
            <h1>Anuncios:</h1>
        <div class="wrapper">
            @foreach ($anuncios as $anuncio)
            
                <div class="card itemx" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title" style="color: #0275d8;">{{ $anuncio->anu_titulo }}</h5>
                      <h6 class="card-text" style="font-size: 0.875em; color:#cecece">{{ $anuncio->anu_fechapub }}</h6>
                      <p class="card-text">{{ $anuncio->anu_contenido }}</p>
                      <h6>Have a nice day!</h6>
                    </div>
                </div>
            
            @endforeach
        </div>
        <br>
        <div style="display: flex; justify-content: flex-end">
            @foreach ($visitas as $visita)
                <h4>Cantidad de visitas: {{ $visita->numero_visitas }}</h4>
            @endforeach
        </div>
    </div>
        
    {{-- CONTENT ENDS --}}

    <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>