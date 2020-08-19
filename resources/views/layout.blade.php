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

<body class="hold-transition sidebar-mini">
  <div class="wrapper">


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="innerNavbar">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" id="menuIcon"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" id="ColorConfig"><i class="fas fa-cog"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" id="mainSideBar">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link" id="NavLogo">
        <img src="/dist/img/logoV.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VABOL L.T.D.A. </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/dist/img/user7-128x128.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            @auth
            <a href="#" class="d-block" id="NavUser">
              <h>
                {{auth()->user()->email}}
              </h>
            </a>
            @endauth
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
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
                  <a href="#" class="nav-link" id="NavAbogado">
                    <i class="far fa-user-circle nav-icon"></i>
                    <p>Abogado</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" id="NavCliente">
                    <i class="far fa-user-circle nav-icon"></i>
                    <p>Cliente</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-user-circle nav-icon"></i>
                    <p>Usuario</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item has-treeview menu-open">
              <a href="{{ route('documento.create') }}" class="nav-link active" id="NavDoc">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Documento
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link" id="NavDocu">
                    <i class="far fa-file nav-icon"></i>
                    <p>Documentos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('categoriadocumento.index') }}" class="nav-link" id="NavCdoc">
                    <i class="far fa-folder-open nav-icon"></i>
                    <p>Categorías Documento</p>
                  </a>
                </li>
              </ul>
            </li>
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
                <div class="bg-gray elevation-2" onclick="Theme('#F8F9FA','#212529','#343A40');" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div>
                <div class="bg-light elevation-2" onclick="Theme('#2176ff','#ffffff','#eff1f3');" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div>
                <div class="bg-danger elevation-2" onclick="Theme('#F8F9FA','#bfc0c0','#D80032');" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div>
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
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>

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

      //CAM
      function Theme(colorText,colorBG,colorNavbar){

        document.getElementById("mainSideBar").style.background = colorNavbar;
        document.getElementById("innerNavbar").style.background = colorBG;

        document.getElementById("NavUsuarios").style.background = colorBG;
        document.getElementById("NavDoc").style.background = colorBG;
        document.getElementById("NavPub").style.background = colorBG;
        
        document.getElementById("NavUsuarios").style.color = colorText;
        document.getElementById("NavAbogado").style.color = colorText;
        document.getElementById("NavCliente").style.color = colorText;
        document.getElementById("NavDoc").style.color = colorText;
        document.getElementById("NavDocu").style.color = colorText;
        document.getElementById("NavCdoc").style.color = colorText;
        document.getElementById("NavPub").style.color = colorText;
        document.getElementById("NavCanu").style.color = colorText;
        document.getElementById("NavAnu").style.color = colorText;
        document.getElementById("NavSol").style.color = colorText;
        document.getElementById("NavUser").style.color = colorText;
        document.getElementById("NavLogo").style.color = colorText;
        document.getElementById("menuIcon").style.color = colorText;
        document.getElementById("ColorConfig").style.color = colorText;
      }
    </script>
  </div>
  </div>
</body>

</html>