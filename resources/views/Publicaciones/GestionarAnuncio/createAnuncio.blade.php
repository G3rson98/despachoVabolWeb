@extends('layout')

@section('content')
<div style="height: 20px"></div>
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Registrar Anuncio</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  <form action="{{ url('/anuncio') }}" role="form" method="POST">
    {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group">
            <label for="anu_titulo">Título</label>
            <input type="text" class="form-control" name="anu_titulo" id="anu_titulo" placeholder="Ingresar Título">
        </div>
        <div class="form-group">
            <label for="anu_contenido">Contenido</label>
            <input type="text" class="form-control" name="anu_contenido" id="anu_contenido" placeholder="Ingresar Contenido">
        </div>
        <div class="form-group">
          <label for="anu_abogado">Abogado</label>
          <select class="form-control select2" style="width: 100%;" name="anu_abogado" id="anu_abogado">
            <option value="0">Seleccione un abogado...</option>
            @foreach ($abogados as $abogado)
              <option value="{{ $abogado['abg_ci'] }}">{{ $abogado['abg_nombre'] }} {{ $abogado['abg_apellidop'] }} {{ $abogado['abg_apellidom'] }}</option>
            @endforeach
          </select>
      </div>
      <div class="form-group">
        <label for="anu_categoria">Categoría</label>
        <select class="form-control select2" style="width: 100%;" name="anu_categoria" id="anu_categoria">
          <option value="0">Seleccione una categoría...</option>
          @foreach ($categorias as $categoria)
              <option value="{{ $categoria['cat_id'] }}">{{ $categoria['cat_nombre'] }}</option>
          @endforeach
        </select>
    </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer text-center">
            <a href="{{url('/anuncio/')}}" class="btn btn-danger col-4">Cancelar</a> 
            <span class="col-1"></span>
            <button type="submit" class="btn btn-primary col-4">Registrar</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
@endsection()