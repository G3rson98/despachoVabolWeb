@extends('layout')

@section('content')

<br>
    <h1>Subir Documento</h1>
    <br>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar documento</h3>
        </div>
        <form method="POST" action="{{ route('documento.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">

                <div class="form-group">
                    <label for="doc_descripcion">Descripción</label>
                    <input type="text" class="form-control" name="doc_descripcion" id="doc_descripcion" placeholder="Describa el documento a seguir">
                </div>

                <div class="form-group">
                    <label>Selecciona el cliente: </label>
                    <select class="form-control" name="doc_cliente" id="doc_cliente">
                        <option value="0">Seleccione un cliente...</option>
                        @foreach($clientes as $cliente)
                            <option value="{{$cliente->cl_nit}}"> {{$cliente->cl_razonsocial}} - Nit: {{$cliente->cl_nit}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Selecciona la categoría del documento: </label>
                    <select class="form-control" name="doc_categoriadoc" id="doc_categoriadoc">
                        <option value="0">Seleccione una categoría...</option>
                        @foreach($categorias as $cat)
                            <option value="{{$cat->catdoc_id}}"> {{$cat->catdoc_nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <label>Escoja un documento:</label>
                <div class="form-group">
                    
                    <input type="file" id="doc_url" name="doc_url">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Subir</button>
            </div>
        </form>
    </div>

@endsection()