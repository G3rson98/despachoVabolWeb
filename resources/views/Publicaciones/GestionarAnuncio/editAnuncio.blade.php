@extends('layout')

@section('content')
<div class="container">
<div style="height: 20px"></div>
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
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Editar Anuncio</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  <form action="{{ url('/anuncio/'.$anuncio->anu_id) }}" role="form" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
      <div class="card-body">
        <div class="form-group">
            <label for="anu_titulo">Título</label>
            <input type="text" class="form-control" name="anu_titulo" id="anu_tituloEdit" placeholder="Ingresar Título" value="{{ $anuncio->anu_titulo }}">
        </div>
        <div class="form-group">
            <label for="anu_contenido">Contenido</label>
            <input type="text" class="form-control" name="anu_contenido" id="anu_contenidoEdit" placeholder="Ingresar Contenido" value="{{ $anuncio->anu_contenido }}">
        </div>
        <div class="form-group">
          <label for="anu_abogado">Abogado</label>
          <select class="form-control select2" style="width: 100%;" name="anu_abogado" id="anu_abogadoEdit">
            <option value="">Seleccione un abogado...</option>
            @foreach ($abogados as $abogado)
              <option value="{{ $abogado['abg_ci'] }}" @if($abogado->abg_ci === $anuncio->anu_abogado) selected='selected' @endif >{{ $abogado['abg_nombre'] }} {{ $abogado['abg_apellidop'] }} {{ $abogado['abg_apellidom'] }}</option>
            @endforeach
          </select>
      </div>
      <div class="form-group">
        <label for="anu_categoria">Categoría</label>
        <select class="form-control select2" style="width: 100%;" name="anu_categoria" id="anu_categoriaEdit">
          <option value="">Seleccione una categoría...</option>
          @foreach ($categorias as $categoria)
              <option value="{{ $categoria['cat_id'] }}" @if($categoria->cat_id === $anuncio->anu_categoria) selected='selected' @endif >{{ $categoria['cat_nombre'] }}</option>
          @endforeach
        </select>
    </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer text-center">
            <a href="{{url('/anuncio/')}}" class="btn btn-danger col-4">Cancelar</a> 
            <span class="col-1"></span>
            <button type="submit" class="btn btn-primary col-4">Modificar</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
  @endsection()