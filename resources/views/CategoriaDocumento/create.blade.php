@extends('layout')

@section('content')
    <br>
    <h1>Registrar </h1>
    <br>
    <div class="card card-primary">

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
        
        <div class="card-header">
            <h3 class="card-title">Registrar categoría documento</h3>
        </div>
        <form method="POST" action="{{ route('categoriadocumento.store') }}" role="form" id="myForm" name="form">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="catdoc_nombre">Nombre</label>
                    <input type="text" class="form-control" name="catdoc_nombre" id="catdoc_nombre" placeholder="Ingrese el nombre de la categoría" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Descripción</label>
                    <textarea class="form-control" name="catdoc_descripcion" id="catdoc_descripcion" placeholder="Describe la categoría" data-rule="required" required></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
    <div style="display: flex; justify-content: flex-end">
        <h4>Cantidad de visitas: {{ $visitas[0]->numero_visitas }}</h4>
    </div>

@endsection()