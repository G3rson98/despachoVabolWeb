<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
  <title>VABOL | L.T.D.A.</title>

  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Data Tables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand" id="innerNavbar">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" id="menuIcon"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('dashboard') }}" class="nav-link" id="Home" >Home</a>
        </li>        
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" id="ColorConfig"><i class="fas fa-cog"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    {{-- sidebar-dark-primary --}}
    <aside class="main-sidebar elevation-4" id="mainSideBar">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link" id="NavLogo">
        <img src="{{asset('dist/img/logoV.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VABOL L.T.D.A. </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="image">            
            <img src="{{asset('dist/img/user7-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">           
          </div>
        </div>
        <div class="user-panel ">
          <div class="info">
            @auth
            <a href="{{ route('Usuario.show') }}" class="d-block" id="NavUser">
              <h6>
                {{auth()->user()->email}}
              </h6>
            </a>
            @endauth
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
            @if(auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Abogado')
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active"  id="NavUsuarios">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('abogado.index') }}" class="nav-link" id="NavAbogado">
                    <i class="far fa-user-circle nav-icon"></i>
                    <p>Abogado</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('cliente.index') }}" class="nav-link" id="NavCliente">
                    <i class="far fa-user-circle nav-icon"></i>
                    <p>Cliente</p>
                  </a>
                </li>               
              </ul>
            </li>
            @endif            
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active" id="NavDoc">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Documento
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              @if(auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Abogado')
                <li class="nav-item">
                  <a href="{{ route('documento.create') }}" class="nav-link" id="NavDocu">
                    <i class="far fa-file nav-icon"></i>
                    <p>Subir Documentos</p>
                  </a>
                </li>
              @endif
                <li class="nav-item">
                  <a href="{{ route('categoriadocumento.index') }}" class="nav-link" id="NavCdoc">
                    <i class="far fa-folder-open nav-icon"></i>
                    <p>Categorías Documento</p>
                  </a>
                </li>
              </ul>
            </li>
            @if(auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Abogado')
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active" id="NavPub">
                <i class="nav-icon fas fa-info"></i>
                <p>
                  Publicaciones
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('categoriaanuncio.index') }}" class="nav-link" id="NavCanu">
                    <i class="far fa-folder nav-icon"></i>
                    <p>Categoría Anuncios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('anuncio.index') }}" class="nav-link" id="NavAnu">
                    <i class="far fa-edit nav-icon"></i>
                    <p>Anuncios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('solicitudcontacto.index') }}" class="nav-link" id="NavSol">
                    <i class="far fa-address-card nav-icon"></i>
                    <p>Solicitudes de contacto</p>
                  </a>
                </li>
              </ul>
            </li>
            @endif
            @if(auth()->user()->rol == 'Administrador')
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active" id="NavEstadistica">
                <i class="fas fa-chart-pie"></i>
                <p>
                  Estadísticas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('documento.estadistica') }}" class="nav-link" id="NavEstDocu">
                    <i class="fas fa-chart-bar"></i>
                    <p>Estadística documentos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('solcontacto.estadistica') }}" class="nav-link" id="NavEstSol">
                    <i class="fas fa-chart-bar"></i>
                    <p>Estadísticas solicitudes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('abogado.estadistica') }}" class="nav-link" id="NavEstAbg">
                    <i class="fas fa-chart-bar"></i>
                    <p>Estadísticas Abogado</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('cliente.estadistica') }}" class="nav-link" id="NavEstCli">
                    <i class="fas fa-chart-bar"></i>
                    <p>Estadísticas Cliente</p>
                  </a>
                </li>
              </ul>
            </li>
            @endif
            @if(auth()->user()->rol == 'Administrador')
            <li class="nav-item">
              <a href="{{ route('bitacora') }}" class="nav-link" id="">
                <button class="btn btn-primary btn-block"><i class="far fa-chart-bar nav-icon"></i> Bitácora</button>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <form action="{{ route('logout')}}" method="POST">
                {{csrf_field()}}
                <button class="btn btn-danger btn-block"> Cerrar sesion</button>

              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

          <!-- Control Sidebar -->
          {{-- AQUUIIIIIII --}}
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
              <h5>¿Qué tema quieres?</h5>
              <div class="d-flex flex-wrap mb-3">
                <form action="{{ url('/tema/temaDark') }}" role="form" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" class="form-control" name="colora" value="#343A40">
                  <input type="hidden" class="form-control" name="colorb" value="#212529">
                  <input type="hidden" class="form-control" name="colorc" value="#F8F9FA">
                  <button type="submit" class="btn bg-gray elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
                </form>
                <form action="{{ url('/tema/temaLight') }}" role="form" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" class="form-control" name="colora" value="#EFF1F3">
                  <input type="hidden" class="form-control" name="colorb" value="#FFFFFF">
                  <input type="hidden" class="form-control" name="colorc" value="#2176FF">
                  <button type="submit" class="btn bg-light elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
                </form>
                <form action="{{ url('/tema/temaColor') }}" role="form" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" class="form-control" name="colora" value="#D80032">
                  <input type="hidden" class="form-control" name="colorb" value="#BFC0C0">
                  <input type="hidden" class="form-control" name="colorc" value="#F8F9FA">
                  <button type="submit" class="btn bg-danger elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></button>
                </form>
              </div>
            </div>
          </aside>
          <!-- /.control-sidebar -->

          <!-- Main content -->
          <div class="content">
            <div class="container-fluid">
              @yield('content')
              
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      </div>
      <!-- /.control-sidebar -->
      </div>
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Despacho de abogados
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 <a href="#">VABOL L.T.D.A.</a>.</strong> Derechos reservados.
      </footer>
    
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>

    <script>
      $('#edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var com_id = button.data('myid')
        var com_contenido = button.data('mycontent')
        var com_doc = button.data('mydoc')
        var com_usuario = button.data('myuser')
        console.log(com_contenido);

        var modal = $(this)
        modal.find('.modal-body #com_contenido').val(com_contenido);
        modal.find('.modal-body #com_id').val(com_id);
        modal.find('.modal-body #com_doc').val(com_doc);
        modal.find('.modal-body #com_usuario').val(com_usuario);
      })

      $('#editdocumento').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var doc_id = button.data('myid')
        var doc_descripcion = button.data('mydescripcion')
        console.log(doc_id, doc_descripcion);

        var modal = $(this)
        modal.find('.modal-body #doc_descripcion').val(doc_descripcion);
        modal.find('.modal-body #doc_id').val(doc_id);
      })

      window.onload = function() {
        let colora = @json($tema['colora']);
        let colorb = @json($tema['colorb']);
        let colorc = @json($tema['colorc']);
        let rol = @json($tema['rol']);
        Theme(colorc,colorb,colora,rol);
        //Theme('#F8F9FA','#212529','#343A40');
      }

      //CAM
      function Theme(colorText,colorBG,colorNavbar,rol){

        document.getElementById("mainSideBar").style.background = colorNavbar;
        document.getElementById("innerNavbar").style.background = colorBG;


        document.getElementById("NavDoc").style.background = colorBG;


        document.getElementById("NavUser").style.color = colorText;
        document.getElementById("NavLogo").style.color = colorText;
        document.getElementById("menuIcon").style.color = colorText;
        document.getElementById("ColorConfig").style.color = colorText;
        document.getElementById("NavDoc").style.color = colorText;
        document.getElementById("NavCdoc").style.color = colorText;

        document.getElementById("Home").style.color = colorText;

        if (rol === 'Administrador' || rol === 'Abogado'){
          if (rol === 'Administrador'){
            document.getElementById("NavEstDocu").style.color = colorText;//admin
            document.getElementById("NavEstadistica").style.color = colorText;//admin
            document.getElementById("NavEstadistica").style.background = colorBG; //admin
            document.getElementById("NavEstSol").style.color = colorText;//admin
            document.getElementById("NavEstAbg").style.color = colorText;//admin
            document.getElementById("NavEstCli").style.color = colorText;//admin
          } 

          document.getElementById("NavUsuarios").style.background = colorBG; //admin abg
          document.getElementById("NavPub").style.background = colorBG; //admin abg
          
          document.getElementById("NavUsuarios").style.color = colorText;//admin abg
          document.getElementById("NavAbogado").style.color = colorText;//admin abg
          document.getElementById("NavCliente").style.color = colorText;//admin abg

          document.getElementById("NavPub").style.color = colorText;//admin abg
          document.getElementById("NavCanu").style.color = colorText;//admin abg
          document.getElementById("NavAnu").style.color = colorText;//admin abg
          document.getElementById("NavSol").style.color = colorText;//admin abg
          document.getElementById("NavDocu").style.color = colorText;//admin abg

        }
        
      }
    </script>
    </div>
  </div>
</body>

</html>