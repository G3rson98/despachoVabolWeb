@extends('layout')

@section('content')
<div style="height: 20px"></div>
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Editar Categoría de Anuncio</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  <form action="{{ url('/categoriaanuncio') }}" role="form" method="POST">
    {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
          <label for="cat_nombre">Nombre</label>
          <input type="text" class="form-control" name="cat_nombre" id="cat_nombreEdit" placeholder="Ingresar Nombre" value="{{ $categoria->cat_nombre }}">
        </div>
        <div class="form-group">
          <label for="cat_descripcion">Descripción</label>
          <input type="text" class="form-control" name="cat_descripcion" id="cat_descripcionEdit" placeholder="Ingresar Descripción"  value="{{ $categoria->cat_descripcion }}">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer text-center">
            <a href="{{url('/categoriaanuncio/')}}" class="btn btn-danger col-4">Cancelar</a>
            <span class="col-1"></span>
            <button type="submit" class="btn btn-primary col-4">Modificar</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
@endsection()