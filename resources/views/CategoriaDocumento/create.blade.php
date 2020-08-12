@extends('layout')

@section('content')
    <br>
    <h1>Registrar </h1>
    <br>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar categoría documento</h3>
        </div>
        <form method="POST" action="{{ route('categoriadocumento.store') }}" role="form">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="catdoc_nombre">Nombre</label>
                    <input type="text" class="form-control" name="catdoc_nombre" id="catdoc_nombre" placeholder="Ingrese el nombre de la categoría">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Descripción</label>
                    <textarea class="form-control" name="catdoc_descripcion" id="catdoc_descripcion" placeholder="Describe la categoría"></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
@endsection()