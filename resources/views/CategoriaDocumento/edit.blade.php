@extends('layout')

@section('content')
    <br>
    <h1>Editar </h1>
    <br>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar categoría documento</h3>
        </div>
        <form method="POST" action="{{ route('categoriadocumento.update', $categoriaDocumento->catdoc_id) }}" role="form">
            @method('PUT')
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="catdoc_nombre">Nombre</label>
                    <input type="text" class="form-control" name="catdoc_nombre" id="catdoc_nombre" value="{{$categoriaDocumento->catdoc_nombre}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Descripción</label>
                    <textarea class="form-control" name="catdoc_descripcion" id="catdoc_descripcion">{{$categoriaDocumento->catdoc_descripcion}}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
@endsection()