@extends('layout')

@section('content')
    <br>
    <h1>Categoría documento: </h1>
    <br>
    @if(auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Abogado')
        <a href="{{ route('categoriadocumento.create') }}" class="btn btn-success " style="text_align:right">Registrar nuevo +</a>
    @endif
    <br>
    <br>

    <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
    </div> <!-- end .flash-message -->

    <div class="card ">

        <div class="card-header">
            <h3 class="card-title">Lista de categorías de documentos</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>                  
                    <tr class="bg-primary">
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categoriasDocumento->count())  
                        @foreach($categoriasDocumento as $catdoc)  
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{$catdoc->catdoc_nombre}}</td>
                                <td>{{$catdoc->catdoc_descripcion}}</td>
                                <td>
                                    <a href="{{ route('documento.documentosPorCategoria', $catdoc->catdoc_id) }}" class="btn btn-info">Ver Documentos</a>
                                    @if(auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Abogado')
                                    <a href="{{ route('categoriadocumento.edit', $catdoc->catdoc_id) }}" class="btn btn-primary">Editar</a>
                                    <form method="post" action="{{route('categoriadocumento.destroy', $catdoc->catdoc_id)}}" style="display: inline">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button  class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que desea eliminar la categoría documento?');">Eliminar</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">No hay registro !!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        
        </div>
    </div>

    <div style="display: flex; justify-content: flex-end">
        <h4>Cantidad de visitas: {{ $visitas[0]->numero_visitas }}</h4>
    </div>
@endsection()